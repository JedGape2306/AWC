<template>
  <footer class="footer">
    <div class="container footer-content">
      <div class="footer-brand">
        <div class="brand">
          <span class="brand-name">Autemia<span class="brand-dot">.</span></span>
        </div>
        <p class="footer-desc">
          Ayudamos a pequeños y medianos negocios a atender mejor a sus clientes con asistentes en WhatsApp y conexión automática de sus programas de oficina.
        </p>
        <span class="badge">Hecho en Ciudad Valles, S.L.P.</span>
      </div>

      <div class="footer-links">
        <h4 class="links-title">Páginas</h4>
        <router-link to="/">Inicio</router-link>
        <router-link to="/servicios">¿Qué hacemos?</router-link>
        <router-link to="/cotizador">Calculadora de Costos</router-link>
        <router-link to="/nosotros">Quiénes Somos</router-link>
      </div>

      <div class="footer-links">
        <h4 class="links-title">Lo que resolvemos</h4>
        <span>Asistentes para WhatsApp</span>
        <span>Guardar pedidos en Excel en automático</span>
        <span>Confirmaciones por correo</span>
        <span>Soporte y capacitación paso a paso</span>
      </div>
    </div>

    <div class="container footer-bottom">
      <p>© 2024 Autemia — Proyecto de Desarrollo de Aplicaciones Web | Instituto Tecnológico de Ciudad Valles</p>
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
  font-size: 0.95rem;
  margin: 1rem 0;
  max-width: 380px;
  line-height: 1.6;
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
