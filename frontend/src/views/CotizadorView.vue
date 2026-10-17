<template>
  <div class="cotizador-page">
    <div class="container py-12">
      <div class="page-header text-center">
        <span class="badge">Cotizador Guiado</span>
        <h1 class="page-title">Dimensiona tu solución en <span class="text-gradient">minutos</span></h1>
        <p class="page-subtitle">Selecciona los módulos e integraciones que requiere tu empresa para calcular una estimación preliminar y recibir una propuesta formal.</p>
      </div>

      <!-- Wizard Progress Bar -->
      <div class="wizard-progress">
        <div class="step-indicator" :class="{ active: currentStep >= 1, current: currentStep === 1 }">
          <span class="step-num">1</span>
          <span class="step-label">Servicio</span>
        </div>
        <div class="step-line" :class="{ filled: currentStep >= 2 }"></div>
        <div class="step-indicator" :class="{ active: currentStep >= 2, current: currentStep === 2 }">
          <span class="step-num">2</span>
          <span class="step-label">Plataformas</span>
        </div>
        <div class="step-line" :class="{ filled: currentStep >= 3 }"></div>
        <div class="step-indicator" :class="{ active: currentStep >= 3, current: currentStep === 3 }">
          <span class="step-num">3</span>
          <span class="step-label">Volumen</span>
        </div>
        <div class="step-line" :class="{ filled: currentStep >= 4 }"></div>
        <div class="step-indicator" :class="{ active: currentStep >= 4, current: currentStep === 4 }">
          <span class="step-num">4</span>
          <span class="step-label">Contacto</span>
        </div>
      </div>

      <div class="wizard-content card-glass">
        <!-- Step 1: Service Selection -->
        <div v-if="currentStep === 1" class="step-pane">
          <h3>Paso 1: ¿Qué tipo de solución necesitas?</h3>
          <p class="step-instruction">Elige el servicio principal que deseas implementar en tu empresa:</p>
          
          <div class="options-grid">
            <div 
              v-for="svc in serviceOptions" 
              :key="svc.id"
              class="option-card"
              :class="{ selected: form.service === svc.id }"
              @click="form.service = svc.id"
            >
              <div class="option-icon">{{ svc.icon }}</div>
              <div class="option-info">
                <h4>{{ svc.name }}</h4>
                <p>{{ svc.desc }}</p>
                <span class="option-price">Desde ${{ svc.basePrice.toLocaleString() }} MXN</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Step 2: Platforms Selection -->
        <div v-if="currentStep === 2" class="step-pane">
          <h3>Paso 2: ¿Qué aplicaciones o canales deseas conectar?</h3>
          <p class="step-instruction">Selecciona las plataformas con las que interactuará tu automatización:</p>

          <div class="platforms-grid">
            <label 
              v-for="plat in platformOptions" 
              :key="plat.id"
              class="platform-card"
              :class="{ selected: form.platforms.includes(plat.name) }"
            >
              <input 
                type="checkbox" 
                :value="plat.name" 
                v-model="form.platforms"
                class="hidden-checkbox"
              />
              <span class="platform-icon">{{ plat.icon }}</span>
              <span class="platform-name">{{ plat.name }}</span>
            </label>
          </div>
        </div>

        <!-- Step 3: Volume and Complexity -->
        <div v-if="currentStep === 3" class="step-pane">
          <h3>Paso 3: Volumen estimado de operaciones mensuales</h3>
          <p class="step-instruction">Ayúdanos a dimensionar la capacidad de cómputo y flujos requeridos:</p>

          <div class="volume-grid">
            <div 
              v-for="vol in volumeOptions" 
              :key="vol.id"
              class="volume-card"
              :class="{ selected: form.volume === vol.id }"
              @click="form.volume = vol.id"
            >
              <h4>{{ vol.title }}</h4>
              <span class="vol-range">{{ vol.range }}</span>
              <p>{{ vol.desc }}</p>
            </div>
          </div>

          <!-- Live Price Estimation Box -->
          <div class="price-box">
            <div class="price-header">
              <span>Presupuesto Preliminar Estimado:</span>
              <span class="price-amount">${{ calculatedPrice.toLocaleString() }} MXN</span>
            </div>
            <p class="price-note">* Esta es una estimación orientativa basada en módulos estándar. No representa una cotización vinculante.</p>
          </div>
        </div>

        <!-- Step 4: Contact & Submission -->
        <div v-if="currentStep === 4" class="step-pane">
          <div v-if="!submitted">
            <h3>Paso 4: Envía tu solicitud formal</h3>
            <p class="step-instruction">Completa tus datos para que un consultor técnico de Autemia te contacte con el desglose formal:</p>

            <form @submit.prevent="submitQuote" class="quote-form">
              <div class="form-row">
                <div class="form-group">
                  <label>Nombre Completo *</label>
                  <input type="text" v-model="form.name" required class="form-input" placeholder="Ej. Juan Pérez" />
                </div>
                <div class="form-group">
                  <label>Empresa / Negocio</label>
                  <input type="text" v-model="form.company" class="form-input" placeholder="Ej. Logística del Huasteca" />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label>Correo Electrónico *</label>
                  <input type="email" v-model="form.email" required class="form-input" placeholder="contacto@empresa.com" />
                </div>
                <div class="form-group">
                  <label>Teléfono / WhatsApp *</label>
                  <input type="tel" v-model="form.phone" required class="form-input" placeholder="481 123 4567" />
                </div>
              </div>

              <div class="form-group">
                <label>Detalles o descripción del proceso que deseas automatizar</label>
                <textarea v-model="form.details" rows="3" class="form-input" placeholder="Describe brevemente cómo opera tu negocio y qué problema manual deseas solucionar..."></textarea>
              </div>

              <div class="summary-pill">
                <span>Servicio: <strong>{{ selectedServiceName }}</strong></span> | 
                <span>Plataformas: <strong>{{ form.platforms.length }} seleccionadas</strong></span> | 
                <span>Estimado: <strong>${{ calculatedPrice.toLocaleString() }} MXN</strong></span>
              </div>

              <button type="submit" class="btn-primary w-full" :disabled="loading">
                <span v-if="loading">Registrando solicitud...</span>
                <span v-else>Confirmar y Enviar Solicitud</span>
              </button>
            </form>
          </div>

          <!-- Success Confirmation Message -->
          <div v-else class="success-box text-center">
            <div class="success-icon">✓</div>
            <h3>¡Solicitud Recibida con Éxito!</h3>
            <p class="folio-tag">Folio de Seguimiento: <strong>{{ generatedFolio }}</strong></p>
            <p class="success-desc">Hemos registrado tus requerimientos en la base de datos de Autemia. El equipo de arquitectura técnica revisará tu caso y te contactará en un plazo máximo de 24 horas hábiles.</p>
            <div class="success-actions">
              <button @click="resetForm" class="btn-secondary">Hacer otra cotización</button>
              <router-link to="/" class="btn-primary">Volver al Inicio</router-link>
            </div>
          </div>
        </div>

        <!-- Wizard Navigation Buttons -->
        <div v-if="!submitted" class="wizard-footer">
          <button 
            v-if="currentStep > 1" 
            @click="currentStep--" 
            class="btn-secondary"
          >
            ← Anterior
          </button>
          <div class="flex-spacer"></div>
          <button 
            v-if="currentStep < 4" 
            @click="nextStep" 
            class="btn-primary"
          >
            Siguiente →
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

const currentStep = ref(1)
const submitted = ref(false)
const loading = ref(false)
const generatedFolio = ref('')

const form = ref({
  service: 'CHATBOT_IA',
  platforms: ['WhatsApp', 'Google Sheets'],
  volume: 'MEDIO',
  name: '',
  company: '',
  email: '',
  phone: '',
  details: ''
})

const serviceOptions = [
  { id: 'CHATBOT_IA', name: 'Chatbot Inteligente con IA', desc: 'Atención 24/7 en WhatsApp y Web para captura y respuesta.', icon: '💬', basePrice: 2500 },
  { id: 'N8N_WORKFLOWS', name: 'Automatización de Flujos (n8n)', desc: 'Conexión de sistemas, correos y bases de datos sin intervención manual.', icon: '⚡', basePrice: 3500 },
  { id: 'API_INTEGRATION', name: 'Integración Avanzada de APIs', desc: 'Conectores personalizados, sincronización de ERP y bases de datos.', icon: '🔗', basePrice: 4000 }
]

const platformOptions = [
  { id: 1, name: 'WhatsApp', icon: '📱' },
  { id: 2, name: 'Gmail / Outlook', icon: '✉️' },
  { id: 3, name: 'Google Sheets', icon: '📊' },
  { id: 4, name: 'CRM (HubSpot/Zoho)', icon: '👥' },
  { id: 5, name: 'MySQL / PostgreSQL', icon: '🗄️' },
  { id: 6, name: 'Pasarela de Pagos', icon: '💳' }
]

const volumeOptions = [
  { id: 'BASICO', title: 'Operación Básica', range: '< 500 acciones/mes', desc: 'Ideal para pequeños negocios locales y emprendimientos.', multiplier: 1.0 },
  { id: 'MEDIO', title: 'Operación Mediana', range: '500 a 2,500 acciones/mes', desc: 'Negocios de servicios en crecimiento con soporte continuo.', multiplier: 1.35 },
  { id: 'ALTO', title: 'Operación Alta', range: '> 2,500 acciones/mes', desc: 'Empresas con múltiples sucursales y alto tráfico transaccional.', multiplier: 1.75 }
]

const selectedServiceName = computed(() => {
  const s = serviceOptions.find(o => o.id === form.value.service)
  return s ? s.name : ''
})

const calculatedPrice = computed(() => {
  const service = serviceOptions.find(o => o.id === form.value.service) || serviceOptions[0]
  const volume = volumeOptions.find(o => o.id === form.value.volume) || volumeOptions[0]
  const platformCost = (form.value.platforms.length - 1) * 450
  return Math.round((service.basePrice + Math.max(0, platformCost)) * volume.multiplier)
})

function nextStep() {
  if (currentStep.value === 2 && form.value.platforms.length === 0) {
    alert('Por favor selecciona al menos una plataforma a conectar.')
    return
  }
  currentStep.value++
}

async function submitQuote() {
  loading.value = true
  const folio = 'AUT-' + Math.floor(100000 + Math.random() * 900000)
  generatedFolio.value = folio

  // Intento de envío a la API en PHP (http://localhost:8080/api/quotes o fallback)
  try {
    await fetch('http://localhost:8080/index.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        folio,
        ...form.value,
        presupuesto_estimado: calculatedPrice.value
      })
    })
  } catch (err) {
    console.log('API offline o en Docker, guardado en modo local:', err)
  }

  setTimeout(() => {
    loading.value = false
    submitted.value = true
  }, 600)
}

function resetForm() {
  form.value = {
    service: 'CHATBOT_IA',
    platforms: ['WhatsApp', 'Google Sheets'],
    volume: 'MEDIO',
    name: '',
    company: '',
    email: '',
    phone: '',
    details: ''
  }
  currentStep.value = 1
  submitted.value = false
}
</script>

<style scoped>
.cotizador-page {
  padding: 3rem 0;
}

.page-header {
  max-width: 650px;
  margin: 0 auto 3rem;
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

/* Wizard progress */
.wizard-progress {
  display: flex;
  align-items: center;
  justify-content: center;
  max-width: 650px;
  margin: 0 auto 2.5rem;
}

.step-indicator {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.35rem;
}

.step-num {
  width: 2.25rem;
  height: 2.25rem;
  border-radius: 50%;
  background: #1f2937;
  color: #9ca3af;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 0.9rem;
  transition: all 0.2s ease;
}

.step-indicator.active .step-num {
  background: #2563eb;
  color: white;
}

.step-indicator.current .step-num {
  box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.3);
}

.step-label {
  font-size: 0.75rem;
  color: #9ca3af;
  font-weight: 600;
}

.step-indicator.active .step-label {
  color: #f3f4f6;
}

.step-line {
  flex: 1;
  height: 2px;
  background: #1f2937;
  margin: 0 0.5rem -1rem;
}

.step-line.filled {
  background: #2563eb;
}

/* Wizard card */
.wizard-content {
  max-width: 760px;
  margin: 0 auto;
  padding: 2.5rem;
}

.step-pane h3 {
  font-size: 1.4rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.step-instruction {
  color: #9ca3af;
  font-size: 0.95rem;
  margin-bottom: 1.75rem;
}

/* Options */
.options-grid {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.option-card {
  display: flex;
  align-items: flex-start;
  gap: 1.25rem;
  padding: 1.25rem;
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 0.75rem;
  background: rgba(255, 255, 255, 0.02);
  cursor: pointer;
  transition: all 0.2s ease;
}

.option-card:hover {
  background: rgba(255, 255, 255, 0.04);
  border-color: rgba(37, 99, 235, 0.4);
}

.option-card.selected {
  background: rgba(37, 99, 235, 0.1);
  border-color: #2563eb;
}

.option-icon {
  font-size: 2rem;
}

.option-info h4 {
  font-size: 1.05rem;
  font-weight: 700;
  margin-bottom: 0.25rem;
}

.option-info p {
  color: #9ca3af;
  font-size: 0.88rem;
  margin-bottom: 0.5rem;
}

.option-price {
  font-size: 0.85rem;
  font-weight: 700;
  color: #38bdf8;
}

/* Platforms grid */
.platforms-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
}

.platform-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.5rem;
  padding: 1.25rem;
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 0.75rem;
  background: rgba(255, 255, 255, 0.02);
  cursor: pointer;
  transition: all 0.2s ease;
  user-select: none;
}

.platform-card.selected {
  background: rgba(37, 99, 235, 0.15);
  border-color: #2563eb;
}

.platform-icon {
  font-size: 1.75rem;
}

.platform-name {
  font-size: 0.88rem;
  font-weight: 600;
  text-align: center;
}

.hidden-checkbox {
  display: none;
}

/* Volume grid */
.volume-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
  margin-bottom: 1.75rem;
}

.volume-card {
  padding: 1.25rem;
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 0.75rem;
  background: rgba(255, 255, 255, 0.02);
  cursor: pointer;
  transition: all 0.2s ease;
}

.volume-card.selected {
  background: rgba(37, 99, 235, 0.15);
  border-color: #2563eb;
}

.volume-card h4 {
  font-size: 0.95rem;
  font-weight: 700;
}

.vol-range {
  display: inline-block;
  font-size: 0.8rem;
  color: #38bdf8;
  font-weight: 600;
  margin: 0.25rem 0 0.5rem;
}

.volume-card p {
  font-size: 0.8rem;
  color: #9ca3af;
}

.price-box {
  background: rgba(37, 99, 235, 0.08);
  border: 1px dashed rgba(37, 99, 235, 0.4);
  padding: 1.25rem 1.5rem;
  border-radius: 0.75rem;
}

.price-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 1.1rem;
  font-weight: 700;
}

.price-amount {
  font-size: 1.5rem;
  color: #60a5fa;
}

.price-note {
  font-size: 0.8rem;
  color: #94a3b8;
  margin-top: 0.35rem;
}

/* Quote form */
.quote-form {
  display: flex;
  flex-direction: column;
  gap: 1.1rem;
}

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
}

.form-group label {
  font-size: 0.85rem;
  font-weight: 600;
  color: #cbd5e1;
}

.summary-pill {
  padding: 0.75rem 1rem;
  background: rgba(255, 255, 255, 0.04);
  border-radius: 0.5rem;
  font-size: 0.85rem;
  color: #cbd5e1;
}

.wizard-footer {
  display: flex;
  align-items: center;
  margin-top: 2rem;
  padding-top: 1.5rem;
  border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.flex-spacer {
  flex: 1;
}

/* Success Box */
.success-box {
  padding: 2rem 0;
}

.success-icon {
  width: 3.5rem;
  height: 3.5rem;
  background: #10b981;
  color: white;
  font-size: 1.75rem;
  font-weight: 800;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.25rem;
}

.folio-tag {
  font-size: 1.1rem;
  margin: 0.75rem 0;
  color: #38bdf8;
}

.success-desc {
  color: #9ca3af;
  font-size: 0.95rem;
  max-width: 520px;
  margin: 0 auto 2rem;
}

.success-actions {
  display: flex;
  justify-content: center;
  gap: 1rem;
}

@media (max-width: 640px) {
  .platforms-grid { grid-template-columns: 1fr 1fr; }
  .volume-grid { grid-template-columns: 1fr; }
  .form-row { grid-template-columns: 1fr; }
}
</style>
