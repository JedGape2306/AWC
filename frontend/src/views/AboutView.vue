<template>
  <div class="about-page">
    <div class="container py-12">
      <div class="page-header text-center">
        <span class="badge">Quiénes Somos</span>
        <h1 class="page-title">Conoce al equipo detrás de <span class="text-gradient">Autemia</span></h1>
        <p class="page-subtitle">Nacimos en Ciudad Valles con una meta muy clara: ayudar a los negocios y pequeñas empresas a vender más y trabajar mejor usando la tecnología a su favor, sin complicaciones.</p>
      </div>

      <!-- Misión & Visión -->
      <div class="mv-grid">
        <div class="mv-card card-glass">
          <div class="mv-icon">🎯</div>
          <h3>Nuestra Misión</h3>
          <p>Hacer que la tecnología y la inteligencia artificial sean fáciles, prácticas y accesibles para cualquier persona con un negocio. Queremos que ahorres tiempo en tareas repetitivas y que tus clientes siempre reciban la mejor atención.</p>
        </div>

        <div class="mv-card card-glass">
          <div class="mv-icon">🚀</div>
          <h3>Nuestra Visión</h3>
          <p>Ser el equipo de confianza para los negocios de la Huasteca y de todo México cuando piensen en modernizar su atención a clientes, conectar sus programas en automático y hacer crecer sus ventas sin complicaciones.</p>
        </div>
      </div>

      <!-- Equipo de Fundadores -->
      <div class="team-section">
        <div class="section-header text-center">
          <span class="badge">Nuestro Equipo</span>
          <h2 class="section-title">El equipo que te acompaña</h2>
          <p class="section-desc">Estudiantes de Ingeniería en Sistemas del Instituto Tecnológico de Ciudad Valles comprometidos con impulsar tu empresa.</p>
        </div>

        <div class="team-grid">
          <div class="team-card card-glass">
            <div class="avatar-box">JG</div>
            <h4>Jesús Eduardo García Pérez</h4>
            <span class="team-role">Director General y Atención a Clientes</span>
            <span class="team-control">Control: 23690507</span>
            <p>Platica contigo para entender tus necesidades, coordina los proyectos y se asegura de que recibas exactamente lo que tu negocio necesita.</p>
          </div>

          <div class="team-card card-glass">
            <div class="avatar-box">HA</div>
            <h4>Henry Alejandro Aguilar Torres</h4>
            <span class="team-role">Arquitecto de Soluciones</span>
            <span class="team-control">Control: 23690466</span>
            <p>El encargado de programar y conectar los sistemas para que tus datos pasen rápido, seguros y sin errores entre tus aplicaciones.</p>
          </div>

          <div class="team-card card-glass">
            <div class="avatar-box">JR</div>
            <h4>Jesús Rodríguez Velarde</h4>
            <span class="team-role">Especialista en Nube y Servidores</span>
            <span class="team-control">Control: 23690356</span>
            <p>Se asegura de que tus asistentes y conexiones funcionen las 24 horas del día sin interrupciones ni fallas en internet.</p>
          </div>

          <div class="team-card card-glass">
            <div class="avatar-box">AV</div>
            <h4>Ángel Velázquez Orozco</h4>
            <span class="team-role">Diseño y Facilidad de Uso</span>
            <span class="team-control">Control: 23690053</span>
            <p>Diseña las pantallas y la experiencia de las conversaciones para que todo sea súper sencillo, intuitivo y agradable de usar.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.about-page {
  padding: 3rem 0;
}

.page-header {
  max-width: 720px;
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

.mv-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
  margin-bottom: 5rem;
}

.mv-card {
  padding: 2.5rem;
  display: flex;
  flex-direction: column;
}

.mv-icon {
  font-size: 2.5rem;
  margin-bottom: 1rem;
}

.mv-card h3 {
  font-size: 1.35rem;
  font-weight: 700;
  margin-bottom: 0.75rem;
  color: #60a5fa;
}

.mv-card p {
  color: #9ca3af;
  font-size: 0.95rem;
  line-height: 1.65;
}

.team-section {
  padding-top: 2rem;
}

.section-header {
  margin-bottom: 3rem;
}

.section-title {
  font-size: 2rem;
  font-weight: 800;
  margin: 0.5rem 0;
}

.section-desc {
  color: #9ca3af;
}

.team-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.5rem;
}

.team-card {
  padding: 2rem 1.5rem;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.avatar-box {
  width: 3.5rem;
  height: 3.5rem;
  border-radius: 50%;
  background: linear-gradient(135deg, #2563eb, #06b6d4);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 800;
  font-size: 1.1rem;
  margin-bottom: 1.25rem;
}

.team-card h4 {
  font-size: 1.05rem;
  font-weight: 700;
  margin-bottom: 0.25rem;
}

.team-role {
  font-size: 0.85rem;
  color: #38bdf8;
  font-weight: 600;
  display: block;
  line-height: 1.3;
}

.team-control {
  font-size: 0.75rem;
  color: #64748b;
  display: block;
  margin: 0.35rem 0 0.75rem;
}

.team-card p {
  font-size: 0.85rem;
  color: #9ca3af;
  line-height: 1.5;
}

@media (max-width: 900px) {
  .mv-grid { grid-template-columns: 1fr; }
  .team-grid { grid-template-columns: 1fr 1fr; }
}

@media (max-width: 600px) {
  .team-grid { grid-template-columns: 1fr; }
}
</style>
