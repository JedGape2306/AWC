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

$db_status = "Desconectado";
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $db_status = "Conectado exitosamente a MySQL (" . $db_name . ")";
} catch (PDOException $e) {
    $db_status = "Esperando inicialización de BD: " . $e->getMessage();
}

echo json_encode([
    "proyecto" => "Plataforma Web Autemia",
    "version" => "1.0 - Unidad 2",
    "servidor" => "Apache + PHP 8.2 en Docker",
    "estado_api" => "En línea",
    "estado_base_datos" => $db_status,
    "fecha" => date('Y-m-d H:i:s'),
    "mensaje" => "API REST de Autemia lista para la recepción de prospectos y cotizaciones."
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
