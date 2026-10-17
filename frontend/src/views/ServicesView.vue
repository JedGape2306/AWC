<template>
  <div class="services-page">
    <div class="container py-12">
      <div class="page-header text-center">
        <span class="badge">Catálogo Tecnológico</span>
        <h1 class="page-title">Soluciones Especializadas de <span class="text-gradient">Autemia</span></h1>
        <p class="page-subtitle">Diseñadas para eliminar la intervención manual en tareas críticas y escalar la atención a clientes.</p>
      </div>

      <div class="catalog-stack">
        <!-- Service 1: Chatbots -->
        <div class="catalog-card card-glass">
          <div class="catalog-header">
            <span class="catalog-badge">Atención Continua</span>
            <h2>Chatbots Inteligentes de Atención al Cliente</h2>
          </div>
          <div class="catalog-body">
            <p>Implementación de agentes conversacionales para canales de mensajería (WhatsApp Cloud API, Web Chat y Telegram). Nuestro enfoque no es solo responder preguntas frecuentes, sino recopilar información estructurada y detonar flujos operativos internos.</p>
            <div class="specs-grid">
              <div class="spec-item">
                <span class="spec-label">Disponibilidad</span>
                <span class="spec-value">24 horas / 7 días</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Canales Compatibles</span>
                <span class="spec-value">WhatsApp, Web, Messenger</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Procesamiento</span>
                <span class="spec-value">IA Generativa & Flujos Guiados</span>
              </div>
            </div>
          </div>
          <div class="catalog-footer">
            <router-link to="/cotizador" class="btn-primary btn-sm">Cotizar Chatbot</router-link>
          </div>
        </div>

        <!-- Service 2: n8n Workflows -->
        <div class="catalog-card card-glass">
          <div class="catalog-header">
            <span class="catalog-badge">Orquestación</span>
            <h2>Automatización de Flujos de Trabajo con n8n</h2>
          </div>
          <div class="catalog-body">
            <p>Conexión de tus aplicaciones corporativas para sincronizar datos automáticamente. Cuando un cliente realiza una compra, pide una cotización o envía un formulario, el flujo actualiza tu base de datos, envía notificaciones y crea tareas en tu CRM.</p>
            <div class="specs-grid">
              <div class="spec-item">
                <span class="spec-label">Motor Principal</span>
                <span class="spec-value">n8n Self-Hosted / Cloud</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Integración</span>
                <span class="spec-value">Webhooks & REST APIs</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Bases de Datos</span>
                <span class="spec-value">MySQL, PostgreSQL, MongoDB</span>
              </div>
            </div>
          </div>
          <div class="catalog-footer">
            <router-link to="/cotizador" class="btn-primary btn-sm">Cotizar Flujo n8n</router-link>
          </div>
        </div>

        <!-- Service 3: APIs & Cloud -->
        <div class="catalog-card card-glass">
          <div class="catalog-header">
            <span class="catalog-badge">Infraestructura</span>
            <h2>Integración de APIs y Despliegue en Contenedores</h2>
          </div>
          <div class="catalog-body">
            <p>Desarrollo de conectores seguros, arquitecturas basadas en microservicios y despliegue en contenedores Docker para garantizar alta disponibilidad y portabilidad en servidores locales o en la nube.</p>
            <div class="specs-grid">
              <div class="spec-item">
                <span class="spec-label">Backend</span>
                <span class="spec-value">PHP 8.2 / Node.js</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Contenedorización</span>
                <span class="spec-value">Docker & Docker Compose</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Seguridad</span>
                <span class="spec-value">Sanitización, JWT & HTTPS</span>
              </div>
            </div>
          </div>
          <div class="catalog-footer">
            <router-link to="/cotizador" class="btn-primary btn-sm">Cotizar Integración</router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.services-page {
  padding: 3rem 0;
}

.page-header {
  max-width: 650px;
  margin: 0 auto 3.5rem;
  text-align: center;
}

.page-title {
  font-size: 2.6rem;
  font-weight: 800;
  margin: 0.75rem 0;
  letter-spacing: -0.02em;
}

.page-subtitle {
  color: #9ca3af;
  font-size: 1rem;
}

.catalog-stack {
  display: flex;
  flex-direction: column;
  gap: 2rem;
  max-width: 900px;
  margin: 0 auto;
}

.catalog-card {
  padding: 2.25rem;
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
}

.catalog-badge {
  font-size: 0.75rem;
  font-weight: 700;
  color: #38bdf8;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.catalog-header h2 {
  font-size: 1.45rem;
  font-weight: 700;
  margin-top: 0.25rem;
}

.catalog-body p {
  color: #9ca3af;
  font-size: 0.95rem;
  line-height: 1.6;
}

.specs-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
  margin-top: 1.25rem;
  padding: 1rem;
  background: rgba(255, 255, 255, 0.02);
  border-radius: 0.6rem;
  border: 1px solid rgba(255, 255, 255, 0.05);
}

.spec-item {
  display: flex;
  flex-direction: column;
  gap: 0.2rem;
}

.spec-label {
  font-size: 0.75rem;
  color: #64748b;
  text-transform: uppercase;
  font-weight: 600;
}

.spec-value {
  font-size: 0.88rem;
  font-weight: 600;
  color: #e2e8f0;
}

.catalog-footer {
  display: flex;
  justify-content: flex-end;
  padding-top: 0.75rem;
  border-top: 1px solid rgba(255, 255, 255, 0.06);
}

@media (max-width: 640px) {
  .specs-grid {
    grid-template-columns: 1fr;
  }
}
</style>
