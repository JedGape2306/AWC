# Plataforma Web Autemia

> **Proyecto Final — Desarrollo de Aplicaciones Web**  
> **Docente:** Dr. Nitgard Zapata Garay  
> **Institución:** Instituto Tecnológico de Ciudad Valles (ITCV)  

---

## 🚀 Descripción del Proyecto

Aplicación Web Full Stack para la difusión comercial, cotización interactiva y gestión de solicitudes de servicios de automatización de flujos de trabajo (n8n), chatbots inteligentes con IA e integración de APIs para la empresa **Autemia**.

---

## 👥 Integrantes del Equipo

* **23690053** — Ángel Velázquez Orozco *(UI/UX Designer & Frontend)*
* **23690356** — Jesús Rodríguez Velarde *(DevOps & Cloud Engineer)*
* **23690466** — Henry Alejandro Aguilar Torres *(Software Architect & Backend/BD)*
* **23690507** — Jesús Eduardo García Pérez *(CEO & Project Lead)*

---

## 🛠️ Stack Tecnológico

* **Frontend:** Vue 3 + Vite + SPA (Puerto `5173`)
* **Backend:** PHP 8.2 + Apache (API REST en puerto `8080`)
* **Base de Datos:** MySQL 8.0 (Puerto `3306`)
* **Contenedores:** Docker & Docker Compose
* **Control de Versiones:** Git & GitHub

---

## 📁 Estructura del Repositorio

```text
AWC/
├── frontend/          # Single Page Application en Vue 3 con Vite
│   ├── src/           # Vistas (Home, Cotizador Wizard, Servicios, CRM Staff)
│   └── Dockerfile     # Imagen Node 20 para desarrollo
├── backend/           # API RESTful en PHP 8.2
│   ├── index.php      # Endpoints y conexión PDO
│   └── Dockerfile     # Imagen PHP 8.2 con Apache y pdo_mysql
├── database/          # Scripts SQL de inicialización (init.sql)
├── documentacion/     # Plantilla de seguimiento oficial en Word (.docx)
├── compose.yaml       # Orquestación multicontenedor con variables seguras
├── .env.example       # Plantilla pública de variables de entorno
└── README.md          # Guía de instalación y ejecución del proyecto
```

---

## 📦 Puesta en Marcha Rápida (Docker)

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/JedGape2306/AWC.git
   cd AWC
   ```

2. Configurar variables de entorno (sin exponer credenciales):
   ```bash
   cp .env.example .env
   ```

3. Levantar los contenedores con Docker Compose:
   ```bash
   docker compose up -d --build
   ```

4. Accesos locales:
   * **Frontend (Vue 3):** [http://localhost:5173](http://localhost:5173)
   * **Backend API (PHP):** [http://localhost:8080](http://localhost:8080)
   * **Base de Datos (MySQL):** `localhost:3306`
