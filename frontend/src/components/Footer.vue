<template>
  <footer class="footer">
    <div class="container footer-content">
      <div class="footer-brand">
        <div class="brand">
          <span class="brand-name">Autemia<span class="brand-dot">.</span></span>
        </div>
        <p class="footer-desc">
          Startup tecnológica dedicada a la orquestación de flujos de trabajo con n8n, chatbots con IA y sincronización de datos para empresas de servicios.
        </p>
        <span class="badge">Ciudad Valles, S.L.P.</span>
      </div>

      <div class="footer-links">
        <h4 class="links-title">Navegación</h4>
        <router-link to="/">Inicio</router-link>
        <router-link to="/servicios">Servicios de Automatización</router-link>
        <router-link to="/cotizador">Cotizador Interactivo</router-link>
        <router-link to="/nosotros">Equipo de Desarrollo</router-link>
      </div>

      <div class="footer-links">
        <h4 class="links-title">Soluciones</h4>
        <span>Chatbots Conversacionales</span>
        <span>Flujos n8n & Webhooks</span>
        <span>Integración de APIs y BD</span>
        <span>Soporte e Infraestructura Cloud</span>
      </div>
    </div>

    <div class="container footer-bottom">
      <p>© 2024 Autemia Tech — Proyecto Final de Desarrollo de Aplicaciones Web | Instituto Tecnológico de Ciudad Valles</p>
    </div>
  </footer>
</template>

<style scoped>
.footer {
  background: #080c14;
  border-top: 1px solid rgba(255, 255, 255, 0.06);
  padding: 4rem 0 2rem;
  margin-top: 5rem;
}

.footer-content {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: 3rem;
  margin-bottom: 3rem;
}

.brand-name {
  font-size: 1.35rem;
  font-weight: 800;
}

.brand-dot {
  color: #06b6d4;
}

.footer-desc {
  color: #9ca3af;
  font-size: 0.9rem;
  margin: 1rem 0;
  max-width: 380px;
}

.links-title {
  color: #ffffff;
  font-size: 0.95rem;
  font-weight: 700;
  margin-bottom: 1.25rem;
}

.footer-links {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
  font-size: 0.9rem;
  color: #9ca3af;
}

.footer-links a:hover {
  color: #60a5fa;
}

.footer-bottom {
  border-top: 1px solid rgba(255, 255, 255, 0.05);
  padding-top: 2rem;
  text-align: center;
  font-size: 0.85rem;
  color: #6b7280;
}

@media (max-width: 768px) {
  .footer-content {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
}
</style>
