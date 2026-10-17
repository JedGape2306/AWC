<template>
  <div class="home">
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="container hero-container">
        <div class="hero-badge">
          <span class="badge-dot"></span>
          <span>Ahorra tiempo y no pierdas clientes</span>
        </div>
        <h1 class="hero-title">
          Haz que tu negocio atienda y trabaje <span class="text-gradient">en automático</span>
        </h1>
        <p class="hero-subtitle">
          Un asistente inteligente que responde tus mensajes de WhatsApp a cualquier hora, toma pedidos y pasa la información a Excel para que tú te dediques a lo importante: hacer crecer tu negocio.
        </p>

        <div class="hero-actions">
          <router-link to="/cotizador" class="btn-primary">
            <span>Calcular cuánto costaría mi proyecto</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
            </svg>
          </router-link>
          <router-link to="/servicios" class="btn-secondary">
            Ver qué podemos hacer por ti
          </router-link>
        </div>

        <!-- Metrics bar en lenguaje humano -->
        <div class="metrics-grid">
          <div class="metric-card card-glass">
            <span class="metric-value">24 Horas</span>
            <span class="metric-label">Tus clientes nunca esperan respuesta</span>
          </div>
          <div class="metric-card card-glass">
            <span class="metric-value">Cero</span>
            <span class="metric-label">Horas copiando y pegando a mano</span>
          </div>
          <div class="metric-card card-glass">
            <span class="metric-value">100% Fácil</span>
            <span class="metric-label">Nosotros nos encargamos de todo</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Overview -->
    <section class="section">
      <div class="container">
        <div class="section-header">
          <span class="badge">¿En qué te ayudamos?</span>
          <h2 class="section-title">Soluciones sencillas para problemas reales</h2>
          <p class="section-desc">Olvídate de términos complicados. Esto es lo que logramos en tu negocio desde la primera semana:</p>
        </div>

        <div class="services-grid">
          <div class="service-card card-glass featured-card">
            <div class="featured-tag">El Más Solicitado</div>
            <div class="service-icon">💬</div>
            <h3>Asistente Virtual para WhatsApp</h3>
            <p>Tus clientes te escriben y reciben respuesta al instante, incluso de noche o en fin de semana. Da precios, horarios, toma pedidos o citas y te avisa cuando alguien necesita hablar contigo.</p>
            <ul class="service-features">
              <li>✓ No dejas a ningún cliente en visto</li>
              <li>✓ Pide los datos que tú necesitas automáticamente</li>
              <li>✓ Puedes intervenir y responder tú mismo cuando quieras</li>
            </ul>
          </div>

          <div class="service-card card-glass">
            <div class="service-icon">⚡</div>
            <h3>Conexión entre tus Programas</h3>
            <p>¿Cansado de pasar a mano los datos de WhatsApp a un Excel o de mandar correos uno por uno? Hacemos que tus programas se pasen la información solos y sin errores.</p>
            <ul class="service-features">
              <li>✓ Guarda clientes y pedidos directo en Excel o tu sistema</li>
              <li>✓ Envía mensajes o correos de confirmación en automático</li>
              <li>✓ Ahorra horas de trabajo repetitivo en la oficina</li>
            </ul>
          </div>

          <div class="service-card card-glass">
            <div class="service-icon">🤝</div>
            <h3>Soporte y Soluciones a Tu Medida</h3>
            <p>Si tienes un sistema especial en tu empresa o una tienda en línea, lo conectamos a la medida para que todo funcione como relojito y con la asesoría de nuestro equipo.</p>
            <ul class="service-features">
              <li>✓ Explicación clara sin enredos técnicos</li>
              <li>✓ Pruebas paso a paso antes de empezar a usarlo</li>
              <li>✓ Acompañamiento continuo y soporte directo</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Simple Steps Section -->
    <section class="section steps-section">
      <div class="container">
        <div class="section-header">
          <span class="badge">Es muy fácil</span>
          <h2 class="section-title">¿Cómo trabajamos contigo?</h2>
          <p class="section-desc">No necesitas saber nada de programación. Solo seguimos 3 pasos:</p>
        </div>

        <div class="steps-grid">
          <div class="step-card card-glass">
            <div class="step-badge">Paso 1</div>
            <h4>Nos platicas qué necesitas</h4>
            <p>Nos cuentas cómo trabaja tu negocio hoy y qué tareas te quitan más tiempo o qué clientes tardas en atender.</p>
          </div>
          <div class="step-card card-glass">
            <div class="step-badge">Paso 2</div>
            <h4>Nosotros lo armamos</h4>
            <p>Diseñamos y dejamos listo el asistente y la conexión con tus programas para que trabajen en automático.</p>
          </div>
          <div class="step-card card-glass">
            <div class="step-badge">Paso 3</div>
            <h4>Empiezas a usarlo</h4>
            <p>Te enseñamos a usarlo en 15 minutos y listo: tus clientes reciben mejor atención y tú ganas tiempo libre.</p>
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
  font-size: 3.4rem;
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
  line-height: 1.6;
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
  font-size: 1.85rem;
  font-weight: 800;
  color: #60a5fa;
}

.metric-label {
  font-size: 0.85rem;
  color: #9ca3af;
  margin-top: 0.25rem;
  text-align: center;
}

.section {
  padding: 5rem 0;
}

.steps-section {
  padding-top: 1rem;
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
  line-height: 1.6;
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

.steps-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.5rem;
}

.step-card {
  padding: 2rem;
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.step-badge {
  display: inline-block;
  align-self: flex-start;
  font-size: 0.75rem;
  font-weight: 800;
  color: #38bdf8;
  background: rgba(56, 189, 248, 0.1);
  padding: 0.2rem 0.6rem;
  border-radius: 9999px;
}

.step-card h4 {
  font-size: 1.15rem;
  font-weight: 700;
}

.step-card p {
  font-size: 0.9rem;
  color: #9ca3af;
  line-height: 1.6;
}

@media (max-width: 900px) {
  .hero-title { font-size: 2.4rem; }
  .services-grid { grid-template-columns: 1fr; }
  .steps-grid { grid-template-columns: 1fr; }
  .metrics-grid { grid-template-columns: 1fr; }
  .hero-actions { flex-direction: column; width: 100%; max-width: 320px; }
}
</style>
