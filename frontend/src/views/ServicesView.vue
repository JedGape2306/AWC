<template>
  <div class="services-page">
    <div class="container py-12">
      <div class="page-header text-center">
        <span class="badge">¿Qué hacemos por tu negocio?</span>
        <h1 class="page-title">Soluciones diseñadas para <span class="text-gradient">facilitarte la vida</span></h1>
        <p class="page-subtitle">Nos encargamos de que la tecnología trabaje para ti, no que tú tengas que complicarte con ella.</p>
      </div>

      <div class="catalog-stack">
        <!-- Service 1: Chatbots -->
        <div class="catalog-card card-glass">
          <div class="catalog-header">
            <span class="catalog-badge">Atención Rápida</span>
            <h2>Asistentes Virtuales para WhatsApp</h2>
          </div>
          <div class="catalog-body">
            <p>
              ¿Cuántas veces un cliente te ha escrito a las 10 de la noche o en domingo pidiendo precios y, cuando le respondes al día siguiente, ya le compró a la competencia? Un asistente virtual atiende de inmediato, comparte tu menú o catálogo con fotos, resuelve dudas frecuentes y toma pedidos o citas mientras tú atiendes el mostrador o descansas.
            </p>
            <div class="specs-grid">
              <div class="spec-item">
                <span class="spec-label">Horario de Atención</span>
                <span class="spec-value">24 horas, los 365 días del año</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">¿Dónde funciona?</span>
                <span class="spec-value">Directo en tu WhatsApp o página web</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">¿Es difícil de usar?</span>
                <span class="spec-value">¡No! Responde como si fuera una persona</span>
              </div>
            </div>
          </div>
          <div class="catalog-footer">
            <router-link to="/cotizador" class="btn-primary btn-sm">Quiero un Asistente en mi WhatsApp</router-link>
          </div>
        </div>

        <!-- Service 2: Workflows -->
        <div class="catalog-card card-glass">
          <div class="catalog-header">
            <span class="catalog-badge">Ahorro de Tiempo</span>
            <h2>Conexión Automática entre tus Programas</h2>
          </div>
          <div class="catalog-body">
            <p>
              Si pasas horas de tu semana copiando números de teléfono de WhatsApp a una libreta o a un Excel, mandando correos de confirmación uno por uno o avisando a tu equipo sobre nuevos pedidos, este servicio es para ti. Hacemos que tus programas se comuniquen entre sí: cuando un cliente escribe o compra, sus datos se guardan solos en tu Excel y se genera su comprobante en segundos.
            </p>
            <div class="specs-grid">
              <div class="spec-item">
                <span class="spec-label">Beneficio Principal</span>
                <span class="spec-value">Ahorras de 2 a 4 horas de oficina al día</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Programas que conectamos</span>
                <span class="spec-value">WhatsApp, Excel, Gmail, Outlook, etc.</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Cero Errores</span>
                <span class="spec-value">La información pasa exacta y sin equivocaciones</span>
              </div>
            </div>
          </div>
          <div class="catalog-footer">
            <router-link to="/cotizador" class="btn-primary btn-sm">Quiero Automatizar mis Tareas</router-link>
          </div>
        </div>

        <!-- Service 3: Custom Solutions -->
        <div class="catalog-card card-glass">
          <div class="catalog-header">
            <span class="catalog-badge">A tu Medida</span>
            <h2>Sistemas y Conexiones Especiales para Empresas</h2>
          </div>
          <div class="catalog-body">
            <p>
              Si tienes un negocio más grande, varias sucursales, una tienda en línea o utilizas un sistema de inventarios y cobro propio, diseñamos la solución exacta que necesitas. Nos aseguramos de que todo tu negocio esté conectado de manera segura, rápida y con respaldo continuo de nuestro equipo local.
            </p>
            <div class="specs-grid">
              <div class="spec-item">
                <span class="spec-label">Asesoría</span>
                <span class="spec-value">Platicamos contigo para entender tu caso</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Instalación</span>
                <span class="spec-value">Nosotros configuramos y probamos todo</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Capacitación</span>
                <span class="spec-value">Te enseñamos a ti y a tu personal a usarlo</span>
              </div>
            </div>
          </div>
          <div class="catalog-footer">
            <router-link to="/cotizador" class="btn-primary btn-sm">Solicitar Asesoría Personalizada</router-link>
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
  font-size: 2.5rem;
  font-weight: 800;
  margin: 0.75rem 0;
  letter-spacing: -0.02em;
}

.page-subtitle {
  color: #9ca3af;
  font-size: 1.05rem;
  line-height: 1.6;
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
  line-height: 1.65;
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
  gap: 0.25rem;
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
  line-height: 1.4;
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
