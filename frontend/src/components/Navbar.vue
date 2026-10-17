<template>
  <header class="header">
    <div class="container nav-container">
      <router-link to="/" class="brand">
        <div class="logo-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m18 16 4-4-4-4"/>
            <path d="m6 8-4 4 4 4"/>
            <path d="m14.5 4-5 16"/>
          </svg>
        </div>
        <span class="brand-name">Autemia<span class="brand-dot">.</span></span>
      </router-link>

      <nav class="nav-links">
        <router-link to="/" class="nav-item">Inicio</router-link>
        <router-link to="/servicios" class="nav-item">Servicios</router-link>
        <router-link to="/cotizador" class="nav-item">Cotizador</router-link>
        <router-link to="/nosotros" class="nav-item">Nosotros</router-link>
        <router-link to="/admin" class="nav-item nav-admin">
          <span class="admin-badge">Staff</span>
        </router-link>
      </nav>

      <div class="nav-actions">
        <router-link to="/cotizador" class="btn-primary btn-sm">
          Cotizar Solución
        </router-link>
      </div>
    </div>
  </header>
</template>

<style scoped>
.header {
  position: sticky;
  top: 0;
  z-index: 50;
  background: rgba(11, 15, 25, 0.85);
  backdrop-filter: blur(16px);
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  height: 4.5rem;
  display: flex;
  align-items: center;
}

.nav-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}

.brand {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.logo-icon {
  width: 2.25rem;
  height: 2.25rem;
  border-radius: 0.6rem;
  background: linear-gradient(135deg, #2563eb, #06b6d4);
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
}

.brand-name {
  font-size: 1.35rem;
  font-weight: 800;
  letter-spacing: -0.02em;
}

.brand-dot {
  color: #06b6d4;
}

.nav-links {
  display: flex;
  align-items: center;
  gap: 2rem;
}

.nav-item {
  font-weight: 500;
  color: #9ca3af;
  font-size: 0.95rem;
  transition: color 0.2s ease;
}

.nav-item:hover, .router-link-exact-active {
  color: #ffffff;
}

.admin-badge {
  font-size: 0.75rem;
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.15);
  padding: 0.2rem 0.6rem;
  border-radius: 9999px;
  color: #cbd5e1;
}

.btn-sm {
  padding: 0.55rem 1.15rem;
  font-size: 0.88rem;
}

@media (max-width: 768px) {
  .nav-links {
    display: none;
  }
}
</style>
