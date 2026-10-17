<template>
  <div class="about-page">
    <div class="container py-12">
      <div class="page-header text-center">
        <span class="badge">Nuestra Empresa</span>
        <h1 class="page-title">Acerca de <span class="text-gradient">Autemia</span></h1>
        <p class="page-subtitle">Startup de base tecnológica nacida en el Instituto Tecnológico de Ciudad Valles, enfocada en democratizar la automatización y la inteligencia artificial para negocios.</p>
      </div>

      <!-- Misión & Visión -->
      <div class="mv-grid">
        <div class="mv-card card-glass">
          <div class="mv-icon">🎯</div>
          <h3>Misión</h3>
          <p>Desarrollar soluciones de automatización y chatbots accesibles, confiables y adaptables que ayuden a las empresas a mejorar su atención al cliente, optimizar procesos repetitivos y aprovechar de forma práctica las tecnologías digitales.</p>
        </div>

        <div class="mv-card card-glass">
          <div class="mv-icon">🚀</div>
          <h3>Visión</h3>
          <p>Consolidar a Autemia como una empresa tecnológica reconocida por crear automatizaciones eficientes y experiencias conversacionales de calidad, capaces de integrarse con diferentes plataformas y crecer junto con las necesidades de sus clientes.</p>
        </div>
      </div>

      <!-- Equipo de Fundadores -->
      <div class="team-section">
        <div class="section-header text-center">
          <span class="badge">Talento ITCV</span>
          <h2 class="section-title">Equipo Fundador</h2>
          <p class="section-desc">Estudiantes de Ingeniería en Sistemas Computacionales a cargo del diseño, arquitectura y desarrollo.</p>
        </div>

        <div class="team-grid">
          <div class="team-card card-glass">
            <div class="avatar-box">JG</div>
            <h4>Jesús Eduardo García Pérez</h4>
            <span class="team-role">CEO / Project Lead</span>
            <span class="team-control">Control: 23690507</span>
            <p>Dirección estratégica del proyecto, validación de modelo de negocio y coordinación de entregables.</p>
          </div>

          <div class="team-card card-glass">
            <div class="avatar-box">HA</div>
            <h4>Henry Alejandro Aguilar Torres</h4>
            <span class="team-role">Software Architect</span>
            <span class="team-control">Control: 23690466</span>
            <p>Diseño de arquitectura de software, modelado de base de datos MySQL y estructuración de la API REST en PHP.</p>
          </div>

          <div class="team-card card-glass">
            <div class="avatar-box">JR</div>
            <h4>Jesús Rodríguez Velarde</h4>
            <span class="team-role">DevOps / Cloud Engineer</span>
            <span class="team-control">Control: 23690356</span>
            <p>Infraestructura en la nube, orquestación de contenedores Docker Compose y despliegue continuo.</p>
          </div>

          <div class="team-card card-glass">
            <div class="avatar-box">AV</div>
            <h4>Ángel Velázquez Orozco</h4>
            <span class="team-role">UI/UX Designer & Frontend</span>
            <span class="team-control">Control: 23690053</span>
            <p>Diseño de interfaces, experiencia de usuario reactiva en Vue 3 y maquetado de flujos interactivos.</p>
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
  max-width: 700px;
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
  font-size: 1.4rem;
  font-weight: 700;
  margin-bottom: 0.75rem;
  color: #60a5fa;
}

.mv-card p {
  color: #9ca3af;
  font-size: 0.95rem;
  line-height: 1.7;
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
}

.team-control {
  font-size: 0.75rem;
  color: #64748b;
  display: block;
  margin: 0.25rem 0 0.75rem;
}

.team-card p {
  font-size: 0.82rem;
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
