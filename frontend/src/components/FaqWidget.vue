<template>
  <div class="faq-widget">
    <button v-if="!isOpen" @click="isOpen = true" class="widget-toggle" title="Preguntas Frecuentes">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
      </svg>
      <span>¿Dudas?</span>
    </button>

    <div v-else class="widget-panel card-glass">
      <div class="widget-header">
        <div class="widget-title">
          <span class="status-indicator"></span>
          <h4>Asistente Autemia</h4>
        </div>
        <button @click="isOpen = false" class="close-btn">&times;</button>
      </div>

      <div class="widget-body">
        <p class="intro-text">Selecciona una consulta frecuente para conocer más sobre nuestras soluciones:</p>
        <div class="faq-list">
          <div v-for="(faq, i) in faqs" :key="i" class="faq-item">
            <button @click="activeFaq = activeFaq === i ? null : i" class="faq-question">
              <span>{{ faq.q }}</span>
              <span class="faq-icon">{{ activeFaq === i ? '−' : '+' }}</span>
            </button>
            <div v-if="activeFaq === i" class="faq-answer">
              {{ faq.a }}
            </div>
          </div>
        </div>
      </div>

      <div class="widget-footer">
        <router-link to="/cotizador" @click="isOpen = false" class="btn-primary btn-sm w-full">
          Ir al Cotizador Guiado
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const isOpen = ref(false)
const activeFaq = ref(null)

const faqs = [
  {
    q: '¿Qué es n8n y cómo ayuda a mi empresa?',
    a: 'n8n es un motor de orquestación de flujos de trabajo que conecta tus herramientas existentes (WhatsApp, correo, CRM, hojas de cálculo) para realizar tareas repetitivas de forma automática y sin errores humanos.'
  },
  {
    q: '¿Cómo funciona el chatbot de Autemia?',
    a: 'Integramos chatbots capaces de responder consultas de tus clientes 24/7, recopilar datos de contacto y activar acciones automáticas (como registrar prospectos o agendar citas).'
  },
  {
    q: '¿Cuánto tiempo toma implementar una automatización?',
    a: 'Proyectos sencillos toman de 3 a 5 días hábiles. Soluciones avanzadas con integraciones multi-sistema se completan en 2 a 3 semanas.'
  }
]
</script>

<style scoped>
.faq-widget {
  position: fixed;
  bottom: 2rem;
  right: 2rem;
  z-index: 100;
}

.widget-toggle {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  background: linear-gradient(135deg, #2563eb, #06b6d4);
  color: white;
  border: none;
  padding: 0.85rem 1.25rem;
  border-radius: 9999px;
  font-weight: 700;
  cursor: pointer;
  box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4);
  transition: transform 0.2s ease;
}

.widget-toggle:hover {
  transform: scale(1.05);
}

.widget-panel {
  width: 360px;
  max-width: calc(100vw - 3rem);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
  overflow: hidden;
}

.widget-header {
  padding: 1rem 1.25rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  background: rgba(37, 99, 235, 0.1);
}

.widget-title {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.status-indicator {
  width: 8px;
  height: 8px;
  background: #10b981;
  border-radius: 50%;
  box-shadow: 0 0 8px #10b981;
}

.close-btn {
  background: none;
  border: none;
  color: #9ca3af;
  font-size: 1.5rem;
  cursor: pointer;
}

.widget-body {
  padding: 1.25rem;
  max-height: 380px;
  overflow-y: auto;
}

.intro-text {
  font-size: 0.85rem;
  color: #9ca3af;
  margin-bottom: 1rem;
}

.faq-list {
  display: flex;
  flex-direction: column;
  gap: 0.6rem;
}

.faq-item {
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 0.5rem;
  background: rgba(255, 255, 255, 0.02);
}

.faq-question {
  width: 100%;
  text-align: left;
  padding: 0.75rem 0.85rem;
  background: none;
  border: none;
  color: #e2e8f0;
  font-size: 0.85rem;
  font-weight: 600;
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
}

.faq-answer {
  padding: 0 0.85rem 0.75rem;
  font-size: 0.8rem;
  color: #94a3b8;
  line-height: 1.5;
}

.widget-footer {
  padding: 1rem 1.25rem;
  border-top: 1px solid rgba(255, 255, 255, 0.06);
}

.w-full {
  width: 100%;
}
</style>
