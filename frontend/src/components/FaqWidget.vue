<template>
  <div class="faq-widget">
    <button v-if="!isOpen" @click="isOpen = true" class="widget-toggle" title="Preguntas Frecuentes">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
      </svg>
      <span>¿Tienes dudas?</span>
    </button>

    <div v-else class="widget-panel card-glass">
      <div class="widget-header">
        <div class="widget-title">
          <span class="status-indicator"></span>
          <h4>Preguntas Frecuentes</h4>
        </div>
        <button @click="isOpen = false" class="close-btn">&times;</button>
      </div>

      <div class="widget-body">
        <p class="intro-text">Resolvemos tus dudas en palabras sencillas:</p>
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
          Calcular costo de mi proyecto
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
    q: '¿Necesito saber de computación para usar esto?',
    a: '¡Para nada! Nosotros configuramos y probamos todo por ti. Te enseñamos en 15 minutos cómo funciona y lo puedes revisar directo desde tu teléfono o computadora tan fácil como enviar un mensaje.'
  },
  {
    q: '¿Puedo seguir usando mi WhatsApp como siempre?',
    a: 'Sí, totalmente. Tus clientes te escriben como siempre. El asistente contesta las preguntas repetitivas (precios, horarios, ubicación), pero tú puedes intervenir y escribirles personalmente cuando tú quieras.'
  },
  {
    q: '¿Cuánto tiempo tardan en tenerlo listo?',
    a: 'La mayoría de los asistentes y conexiones entre programas quedan listos entre 3 y 5 días hábiles, listos para recibir clientes.'
  },
  {
    q: '¿Qué pasa si cambian mis precios o productos?',
    a: 'Te dejamos una hoja muy sencilla en Excel o Google Sheets donde si cambias un precio, tu asistente de WhatsApp se actualiza de inmediato sin que tengas que pagar nada extra.'
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
  width: 380px;
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
  max-height: 400px;
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
  line-height: 1.4;
}

.faq-answer {
  padding: 0 0.85rem 0.75rem;
  font-size: 0.82rem;
  color: #94a3b8;
  line-height: 1.55;
}

.widget-footer {
  padding: 1rem 1.25rem;
  border-top: 1px solid rgba(255, 255, 255, 0.06);
}

.w-full {
  width: 100%;
}
</style>
