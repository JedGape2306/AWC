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

* **Frontend:** Vue 3 + Vite + Tailwind CSS (SPA en puerto `5173`)
* **Backend:** PHP 8.2 + Apache (API REST en puerto `8080`)
* **Base de Datos:** MySQL 8.0 (Puerto `3306`)
* **Contenedores:** Docker & Docker Compose
* **Control de Versiones:** Git & GitHub

---

## 📁 Estructura del Repositorio

```text
autemia-web-platform/
├── frontend/          # Single Page Application en Vue 3 con Vite
├── backend/           # API RESTful en PHP 8.2
├── database/          # Scripts SQL de inicialización (init.sql) y modelo DER
├── documentacion/     # Plantilla de seguimiento y documentación evolutiva
├── compose.yaml       # Configuración de Docker Compose multicontenedor
└── README.md          # Información y guía de ejecución del proyecto
```

---

## 📦 Ejecución Inicial con Docker (Previsto)

```bash
docker compose up -d
```
