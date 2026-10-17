-- Script de inicialización de la base de datos para Autemia
CREATE DATABASE IF NOT EXISTS autemia_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE autemia_db;

-- Tabla de Roles
CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    descripcion VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    rol_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE RESTRICT
);

-- Tabla de Catálogo de Servicios
CREATE TABLE IF NOT EXISTS servicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    clave VARCHAR(50) NOT NULL UNIQUE,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    precio_base DECIMAL(10,2) DEFAULT 0.00,
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Prospectos / Solicitudes de Cotización (Leads)
CREATE TABLE IF NOT EXISTS prospectos_leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    folio VARCHAR(20) NOT NULL UNIQUE,
    nombre_contacto VARCHAR(120) NOT NULL,
    empresa VARCHAR(150) NULL,
    email VARCHAR(150) NOT NULL,
    telefono VARCHAR(30) NULL,
    servicio_interes VARCHAR(100) NOT NULL,
    plataformas_integrar TEXT NULL,
    volumen_operaciones VARCHAR(50) NULL,
    presupuesto_estimado DECIMAL(10,2) DEFAULT 0.00,
    detalles_proyecto TEXT NULL,
    estado ENUM('Pendiente', 'En Análisis', 'Cotizado', 'Aprobado', 'Descartado') DEFAULT 'Pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar roles iniciales
INSERT IGNORE INTO roles (id, nombre, descripcion) VALUES
(1, 'admin', 'Administrador General de Autemia'),
(2, 'staff', 'Consultor Técnico e Integrador');

-- Insertar catálogo de servicios inicial
INSERT IGNORE INTO servicios (id, clave, nombre, descripcion, precio_base) VALUES
(1, 'CHATBOT_IA', 'Chatbot Inteligente de Atención al Cliente', 'Chatbot conversacional con IA para soporte 24/7, calificación de prospectos y canalización.', 2500.00),
(2, 'N8N_WORKFLOWS', 'Automatización de Flujos con n8n', 'Orquestación de procesos entre CRM, correo, bases de datos y hojas de cálculo sin intervención manual.', 3500.00),
(3, 'API_INTEGRATION', 'Integración de Sistemas y APIs', 'Conexión de sistemas legados, pasarelas de pago y sincronización de bases de datos.', 4000.00);

-- Insertar usuario inicial del equipo (Admin)
INSERT IGNORE INTO usuarios (id, nombre, email, password_hash, rol_id) VALUES
(1, 'Jesús Eduardo García Pérez', 'admin@autemia.com', '$2y$10$abcdefghijklmnopqrstuvwxy1234567890abcdefghijklm', 1);
