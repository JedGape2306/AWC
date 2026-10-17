<template>
  <div class="home">
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="container hero-container">
        <div class="hero-badge">
          <span class="badge-dot"></span>
          <span>Tecnologías Emergentes & Automatización</span>
        </div>
        <h1 class="hero-title">
          Automatiza tu negocio con <span class="text-gradient">n8n y Chatbots</span> inteligentes
        </h1>
        <p class="hero-subtitle">
          Elimina tareas repetitivas, atiende a tus clientes 24/7 y sincroniza tus aplicaciones sin fricciones técnicas. En Autemia diseñamos flujos digitales adaptados a tu empresa.
        </p>

        <div class="hero-actions">
          <router-link to="/cotizador" class="btn-primary">
            <span>Calcular Cotización en Línea</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
            </svg>
          </router-link>
          <router-link to="/servicios" class="btn-secondary">
            Ver Catálogo de Servicios
          </router-link>
        </div>

        <!-- Metrics bar -->
        <div class="metrics-grid">
          <div class="metric-card card-glass">
            <span class="metric-value">24/7</span>
            <span class="metric-label">Disponibilidad en atención</span>
          </div>
          <div class="metric-card card-glass">
            <span class="metric-value">-70%</span>
            <span class="metric-label">Tiempo en tareas operativas</span>
          </div>
          <div class="metric-card card-glass">
            <span class="metric-value">100%</span>
            <span class="metric-label">Integración en la nube</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Overview -->
    <section class="section">
      <div class="container">
        <div class="section-header">
          <span class="badge">Nuestras Soluciones</span>
          <h2 class="section-title">Ecosistema modular de automatización</h2>
          <p class="section-desc">Conectamos tus canales de comunicación y plataformas para que tu equipo se enfoque en crecer.</p>
        </div>

        <div class="services-grid">
          <div class="service-card card-glass">
            <div class="service-icon">💬</div>
            <h3>Chatbots Conversacionales</h3>
            <p>Atención continua para WhatsApp y Web. Calificación automática de prospectos y canalización a asesores.</p>
            <ul class="service-features">
              <li>✓ Respuestas instantáneas sin esperas</li>
              <li>✓ Captura guiada de requerimientos</li>
              <li>✓ Conexión directa a CRM y hojas de cálculo</li>
            </ul>
          </div>

          <div class="service-card card-glass featured-card">
            <div class="featured-tag">Más Demandado</div>
            <div class="service-icon">⚡</div>
            <h3>Flujos Automatizados con n8n</h3>
            <p>Orquestación de procesos entre distintas plataformas digitales sin intervención manual ni duplicidad de datos.</p>
            <ul class="service-features">
              <li>✓ Disparo por webhooks y eventos en tiempo real</li>
              <li>✓ Notificaciones por correo y mensajería</li>
              <li>✓ Sincronización continua de bases de datos</li>
            </ul>
          </div>

          <div class="service-card card-glass">
            <div class="service-icon">🔗</div>
            <h3>Integración de APIs y Sistemas</h3>
            <p>Vinculación de herramientas existentes, ERPs y pasarelas de pago para una operación centralizada.</p>
            <ul class="service-features">
              <li>✓ Conectores a la medida</li>
              <li>✓ Seguridad e integridad transaccional</li>
              <li>✓ Despliegue en infraestructura Docker y Cloud</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<style scoped>
.hero-section {
  padding: 5rem 0 3rem;
  text-align: center;
  position: relative;
}

.hero-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.35rem 0.9rem;
  background: rgba(37, 99, 235, 0.12);
  border: 1px solid rgba(37, 99, 235, 0.3);
  border-radius: 9999px;
  font-size: 0.85rem;
  font-weight: 600;
  color: #93c5fd;
  margin-bottom: 1.5rem;
}

.badge-dot {
  width: 7px;
  height: 7px;
  background: #38bdf8;
  border-radius: 50%;
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.4; transform: scale(0.85); }
}

.hero-title {
  font-size: 3.5rem;
  font-weight: 800;
  letter-spacing: -0.03em;
  max-width: 850px;
  line-height: 1.15;
  margin-bottom: 1.5rem;
}

.hero-subtitle {
  font-size: 1.15rem;
  color: #9ca3af;
  max-width: 680px;
  margin-bottom: 2.5rem;
}

.hero-actions {
  display: flex;
  gap: 1rem;
  margin-bottom: 4rem;
}

.metrics-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.5rem;
  width: 100%;
  max-width: 800px;
}

.metric-card {
  padding: 1.5rem;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.metric-value {
  font-size: 2rem;
  font-weight: 800;
  color: #60a5fa;
}

.metric-label {
  font-size: 0.85rem;
  color: #9ca3af;
  margin-top: 0.25rem;
}

.section {
  padding: 5rem 0;
}

.section-header {
  text-align: center;
  max-width: 650px;
  margin: 0 auto 3.5rem;
}

.section-title {
  font-size: 2.2rem;
  font-weight: 800;
  margin: 0.75rem 0;
  letter-spacing: -0.02em;
}

.section-desc {
  color: #9ca3af;
  font-size: 1rem;
}

.services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;
}

.service-card {
  padding: 2.25rem;
  display: flex;
  flex-direction: column;
  position: relative;
  transition: transform 0.2s ease;
}

.service-card:hover {
  transform: translateY(-5px);
}

.featured-card {
  border-color: rgba(37, 99, 235, 0.4);
  background: rgba(17, 24, 39, 0.9);
}

.featured-tag {
  position: absolute;
  top: -12px;
  right: 20px;
  background: linear-gradient(135deg, #2563eb, #06b6d4);
  font-size: 0.75rem;
  font-weight: 700;
  padding: 0.25rem 0.75rem;
  border-radius: 9999px;
  color: white;
}

.service-icon {
  font-size: 2.25rem;
  margin-bottom: 1.25rem;
}

.service-card h3 {
  font-size: 1.35rem;
  font-weight: 700;
  margin-bottom: 0.75rem;
}

.service-card p {
  color: #9ca3af;
  font-size: 0.95rem;
  margin-bottom: 1.5rem;
}

.service-features {
  list-style: none;
  font-size: 0.85rem;
  color: #cbd5e1;
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
  margin-top: auto;
}

@media (max-width: 900px) {
  .hero-title { font-size: 2.5rem; }
  .services-grid { grid-template-columns: 1fr; }
  .metrics-grid { grid-template-columns: 1fr; }
  .hero-actions { flex-direction: column; width: 100%; max-width: 320px; }
}
</style>
