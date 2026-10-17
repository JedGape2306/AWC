<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$db_host = getenv('DB_HOST') ?: 'db';
$db_name = getenv('DB_NAME') ?: 'autemia_db';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') ?: '';

$pdo = null;
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    // Si no conecta, se manejará en cada operación
}

$method = $_SERVER['REQUEST_METHOD'];

// 1. Guardar nueva cotización (POST)
if ($method === 'POST') {
    $rawInput = file_get_contents('php://input');
    $data = json_decode($rawInput, true);

    if (!$data) {
        http_response_code(400);
        echo json_encode(["error" => "Datos JSON inválidos"]);
        exit();
    }

    // Si es para actualizar estado
    if (isset($data['action']) && $data['action'] === 'update_status') {
        if ($pdo) {
            $stmt = $pdo->prepare("UPDATE prospectos_leads SET estado = :estado WHERE folio = :folio");
            $stmt->execute([
                ':estado' => $data['status'] ?? 'Pendiente',
                ':folio' => $data['folio']
            ]);
            echo json_encode(["success" => true, "mensaje" => "Estado actualizado"]);
            exit();
        }
    }

    $folio = $data['folio'] ?? ('AUT-' . rand(100000, 999999));
    $nombre = $data['name'] ?? 'Cliente sin nombre';
    $empresa = $data['company'] ?? '';
    $email = $data['email'] ?? '';
    $telefono = $data['phone'] ?? '';
    $servicio = $data['service'] ?? 'General';
    
    // Normalizar plataformas si viene como arreglo
    $plataformas = '';
    if (isset($data['platforms']) && is_array($data['platforms'])) {
        $plataformas = implode(', ', $data['platforms']);
    } elseif (isset($data['platforms'])) {
        $plataformas = (string)$data['platforms'];
    }

    $volumen = $data['volume'] ?? 'Medio';
    $presupuesto = floatval($data['presupuesto_estimado'] ?? 0);
    $detalles = $data['details'] ?? '';

    if ($pdo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO prospectos_leads 
                (folio, nombre_contacto, empresa, email, telefono, servicio_interes, plataformas_integrar, volumen_operaciones, presupuesto_estimado, detalles_proyecto, estado) 
                VALUES 
                (:folio, :nombre, :empresa, :email, :telefono, :servicio, :plataformas, :volumen, :presupuesto, :detalles, 'Pendiente')");
            
            $stmt->execute([
                ':folio' => $folio,
                ':nombre' => $nombre,
                ':empresa' => $empresa,
                ':email' => $email,
                ':telefono' => $telefono,
                ':servicio' => $servicio,
                ':plataformas' => $plataformas,
                ':volumen' => $volumen,
                ':presupuesto' => $presupuesto,
                ':detalles' => $detalles
            ]);

            http_response_code(201);
            echo json_encode([
                "success" => true,
                "folio" => $folio,
                "mensaje" => "Cotización registrada con éxito en MySQL",
                "datos" => [
                    "folio" => $folio,
                    "name" => $nombre,
                    "company" => $empresa,
                    "email" => $email,
                    "phone" => $telefono,
                    "service" => $servicio,
                    "platforms" => $data['platforms'] ?? [],
                    "price" => $presupuesto,
                    "status" => "Pendiente",
                    "details" => $detalles
                ]
            ]);
            exit();
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(["error" => "Error al guardar en MySQL: " . $e->getMessage()]);
            exit();
        }
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Base de datos no disponible"]);
        exit();
    }
}

// 2. Obtener lista de cotizaciones para el Área de Equipo (GET ?action=leads)
if ($method === 'GET' && isset($_GET['action']) && $_GET['action'] === 'leads') {
    if ($pdo) {
        try {
            $stmt = $pdo->query("SELECT id, folio, nombre_contacto as name, empresa as company, email, telefono as phone, 
                                        servicio_interes as service, plataformas_integrar, volumen_operaciones as volume, 
                                        presupuesto_estimado as price, detalles_proyecto as details, estado as status, created_at 
                                 FROM prospectos_leads 
                                 ORDER BY id DESC");
            $rows = $stmt->fetchAll();
            
            $leads = array_map(function($r) {
                $platArray = [];
                if (!empty($r['plataformas_integrar'])) {
                    $platArray = array_map('trim', explode(',', $r['plataformas_integrar']));
                }
                return [
                    "id" => $r['id'],
                    "folio" => $r['folio'],
                    "name" => $r['name'],
                    "company" => $r['company'] ?: 'Particular',
                    "email" => $r['email'],
                    "phone" => $r['phone'],
                    "service" => $r['service'],
                    "platforms" => $platArray,
                    "volume" => $r['volume'],
                    "price" => floatval($r['price']),
                    "status" => $r['status'],
                    "details" => $r['details'],
                    "created_at" => $r['created_at']
                ];
            }, $rows);

            echo json_encode(["success" => true, "leads" => $leads]);
            exit();
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(["error" => "Error al consultar MySQL: " . $e->getMessage()]);
            exit();
        }
    } else {
        echo json_encode(["success" => true, "leads" => []]);
        exit();
    }
}

// 3. Respuesta por defecto de estado de la API
$db_status = $pdo ? "Conectado exitosamente a MySQL (" . $db_name . ")" : "Desconectado de MySQL";
echo json_encode([
    "proyecto" => "Plataforma Web Autemia",
    "version" => "1.0 - Unidad 2",
    "servidor" => "Apache + PHP 8.2 en Docker",
    "estado_api" => "En línea",
    "estado_base_datos" => $db_status,
    "fecha" => date('Y-m-d H:i:s'),
    "mensaje" => "API REST de Autemia lista para la recepción de prospectos y cotizaciones."
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
