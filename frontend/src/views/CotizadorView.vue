<template>
  <div class="cotizador-page">
    <div class="container py-12">
      <div class="page-header text-center">
        <span class="badge">Calculadora Fácil</span>
        <h1 class="page-title">Calcula el costo de tu solución en <span class="text-gradient">3 minutos</span></h1>
        <p class="page-subtitle">Elige lo que necesitas con unos cuantos clics y te damos una estimación clara, sin compromisos ni palabras enredadas.</p>
      </div>

      <!-- Wizard Progress Bar -->
      <div class="wizard-progress">
        <div class="step-indicator" :class="{ active: currentStep >= 1, current: currentStep === 1 }">
          <span class="step-num">1</span>
          <span class="step-label">¿Qué buscas?</span>
        </div>
        <div class="step-line" :class="{ filled: currentStep >= 2 }"></div>
        <div class="step-indicator" :class="{ active: currentStep >= 2, current: currentStep === 2 }">
          <span class="step-num">2</span>
          <span class="step-label">Tus programas</span>
        </div>
        <div class="step-line" :class="{ filled: currentStep >= 3 }"></div>
        <div class="step-indicator" :class="{ active: currentStep >= 3, current: currentStep === 3 }">
          <span class="step-num">3</span>
          <span class="step-label">Movimiento</span>
        </div>
        <div class="step-line" :class="{ filled: currentStep >= 4 }"></div>
        <div class="step-indicator" :class="{ active: currentStep >= 4, current: currentStep === 4 }">
          <span class="step-num">4</span>
          <span class="step-label">Tu contacto</span>
        </div>
      </div>

      <div class="wizard-content card-glass">
        <!-- Step 1: Service Selection -->
        <div v-if="currentStep === 1" class="step-pane">
          <h3>Paso 1: ¿Qué te gustaría mejorar en tu negocio?</h3>
          <p class="step-instruction">Selecciona la opción que mejor describe lo que necesitas hoy:</p>
          
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
                <span class="option-price">Inversión aproximada: desde ${{ svc.basePrice.toLocaleString() }} MXN</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Step 2: Platforms Selection -->
        <div v-if="currentStep === 2" class="step-pane">
          <h3>Paso 2: ¿Qué herramientas usas en tu día a día?</h3>
          <p class="step-instruction">Marca los programas donde quieres que tu asistente o sistema trabaje:</p>

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
              <span class="platform-sub">{{ plat.help }}</span>
            </label>
          </div>
        </div>

        <!-- Step 3: Volume and Complexity -->
        <div v-if="currentStep === 3" class="step-pane">
          <h3>Paso 3: ¿Más o menos cuántos clientes o mensajes recibes?</h3>
          <p class="step-instruction">Esto nos ayuda a saber el tamaño del sistema que necesitas:</p>

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
              <span>Costo Estimado de Instalación:</span>
              <span class="price-amount">${{ calculatedPrice.toLocaleString() }} MXN</span>
            </div>
            <p class="price-note">
              ✓ <strong>Incluye:</strong> Configuración completa, conexión entre tus programas, pruebas y una sesión de 15 minutos donde te enseñamos a usarlo paso a paso.
            </p>
          </div>
        </div>

        <!-- Step 4: Contact & Submission -->
        <div v-if="currentStep === 4" class="step-pane">
          <div v-if="!submitted">
            <h3>Paso 4: ¿A dónde te enviamos la propuesta y demostración?</h3>
            <p class="step-instruction">Déjanos tus datos de contacto para enviarte una prueba de cómo funcionaría en tu negocio:</p>

            <form @submit.prevent="submitQuote" class="quote-form">
              <div class="form-row">
                <div class="form-group">
                  <label>Tu Nombre Completo *</label>
                  <input type="text" v-model="form.name" required class="form-input" placeholder="Ej. Juan Pérez" />
                </div>
                <div class="form-group">
                  <label>Nombre de tu Negocio o Empresa</label>
                  <input type="text" v-model="form.company" class="form-input" placeholder="Ej. Taller Mecánico El Huasteco" />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label>Teléfono o WhatsApp * (para mandarte la propuesta)</label>
                  <input type="tel" v-model="form.phone" required class="form-input" placeholder="Ej. 481 123 4567" />
                </div>
                <div class="form-group">
                  <label>Correo Electrónico (opcional)</label>
                  <input type="email" v-model="form.email" class="form-input" placeholder="micorreo@gmail.com" />
                </div>
              </div>

              <div class="form-group">
                <label>Platícanos brevemente qué tarea te gustaría que hiciera solo tu sistema</label>
                <textarea v-model="form.details" rows="3" class="form-input" placeholder="Ejemplo: Quiero que cuando un cliente me escriba a WhatsApp pidiendo precios de pasteles, le mande el menú con fotos y me guarde su nombre y pedido en un Excel..."></textarea>
              </div>

              <div class="summary-pill">
                <span>Solución: <strong>{{ selectedServiceName }}</strong></span> | 
                <span>Herramientas: <strong>{{ form.platforms.length }} seleccionadas</strong></span> | 
                <span>Inversión estimada: <strong>${{ calculatedPrice.toLocaleString() }} MXN</strong></span>
              </div>

              <button type="submit" class="btn-primary w-full" :disabled="loading">
                <span v-if="loading">Guardando tu solicitud...</span>
                <span v-else>Quiero mi propuesta y demostración gratuita</span>
              </button>
            </form>
          </div>

          <!-- Success Confirmation Message -->
          <div v-else class="success-box text-center">
            <div class="success-icon">✓</div>
            <h3>¡Muchas gracias! Ya recibimos tus datos</h3>
            <p class="folio-tag">Número de Solicitud: <strong>{{ generatedFolio }}</strong></p>
            <p class="success-desc">
              Un asesor de Autemia revisará lo que necesitas y te escribirá por WhatsApp o te llamará para mostrarte una demostración sencilla, sin enredos y lista para tu negocio.
            </p>
            <div class="success-actions">
              <button @click="resetForm" class="btn-secondary">Hacer otro cálculo</button>
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
            ← Regresar
          </button>
          <div class="flex-spacer"></div>
          <button 
            v-if="currentStep < 4" 
            @click="nextStep" 
            class="btn-primary"
          >
            Continuar →
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
  platforms: ['WhatsApp', 'Excel o Hojas de Cálculo'],
  volume: 'MEDIO',
  name: '',
  company: '',
  email: '',
  phone: '',
  details: ''
})

const serviceOptions = [
  { 
    id: 'CHATBOT_IA', 
    name: 'Asistente para atender en WhatsApp', 
    desc: 'Responde dudas frecuentes, precios, ubicaciones y toma pedidos o citas de inmediato, día y noche.', 
    icon: '💬', 
    basePrice: 2500 
  },
  { 
    id: 'N8N_WORKFLOWS', 
    name: 'Conectar mis programas para ahorrar tiempo', 
    desc: 'Deja de pasar datos a mano: pasa información de WhatsApp a Excel y manda correos de confirmación en automático.', 
    icon: '⚡', 
    basePrice: 3200 
  },
  { 
    id: 'API_INTEGRATION', 
    name: 'Solución completa a la medida de mi negocio', 
    desc: 'Si ya tienes un sistema, programa de facturación o varias sucursales, conectamos todo para que trabaje sincronizado.', 
    icon: '🏢', 
    basePrice: 4200 
  }
]

const platformOptions = [
  { id: 1, name: 'WhatsApp', icon: '📱', help: 'Para hablar con clientes' },
  { id: 2, name: 'Correo Electrónico', icon: '✉️', help: 'Gmail, Outlook, etc.' },
  { id: 3, name: 'Excel o Hojas de Cálculo', icon: '📊', help: 'Para guardar tus registros' },
  { id: 4, name: 'Cobros con Tarjeta', icon: '💳', help: 'Para recibir anticipos' },
  { id: 5, name: 'Sistema de Ventas / Clientes', icon: '👥', help: 'El que ya usas hoy' },
  { id: 6, name: 'Base de Datos Propia', icon: '🗄️', help: 'Para negocios grandes' }
]

const volumeOptions = [
  { id: 'BASICO', title: 'Poco movimiento', range: 'Menos de 20 mensajes al día', desc: 'Para negocios que van empezando o profesionales independientes.', multiplier: 1.0 },
  { id: 'MEDIO', title: 'Movimiento regular', range: '20 a 80 mensajes diarios', desc: 'Negocios con clientela constante que buscan ahorrar 2 o 3 horas diarias.', multiplier: 1.3 },
  { id: 'ALTO', title: 'Mucho movimiento', range: 'Más de 80 mensajes al día', desc: 'Empresas con múltiples vendedores o alto flujo de clientes.', multiplier: 1.7 }
]

const selectedServiceName = computed(() => {
  const s = serviceOptions.find(o => o.id === form.value.service)
  return s ? s.name : ''
})

const calculatedPrice = computed(() => {
  const service = serviceOptions.find(o => o.id === form.value.service) || serviceOptions[0]
  const volume = volumeOptions.find(o => o.id === form.value.volume) || volumeOptions[0]
  const platformCost = (form.value.platforms.length - 1) * 350
  return Math.round((service.basePrice + Math.max(0, platformCost)) * volume.multiplier)
})

function nextStep() {
  if (currentStep.value === 2 && form.value.platforms.length === 0) {
    alert('Por favor marca al menos una herramienta (por ejemplo: WhatsApp).')
    return
  }
  currentStep.value++
}

async function submitQuote() {
  loading.value = true
  const folio = 'AUT-' + Math.floor(100000 + Math.random() * 900000)
  generatedFolio.value = folio

  const payload = {
    folio,
    name: form.value.name,
    company: form.value.company,
    email: form.value.email,
    phone: form.value.phone,
    service: selectedServiceName.value,
    platforms: form.value.platforms,
    volume: form.value.volume,
    presupuesto_estimado: calculatedPrice.value,
    details: form.value.details
  }

  // 1. Guardar copia en localStorage para sincronización inmediata en el navegador
  try {
    const existing = JSON.parse(localStorage.getItem('autemia_local_leads') || '[]')
    existing.unshift({
      ...payload,
      price: calculatedPrice.value,
      status: 'Pendiente'
    })
    localStorage.setItem('autemia_local_leads', JSON.stringify(existing))
  } catch (e) {
    console.warn('Error guardando en localStorage:', e)
  }

  // 2. Enviar a la API REST de PHP en Docker (puerto 8080)
  try {
    const res = await fetch('http://localhost:8080/index.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload)
    })
    const resData = await res.json()
    console.log('Respuesta del servidor PHP MySQL:', resData)
  } catch (err) {
    console.warn('API Docker no alcanzable en este momento, usando respaldo local:', err)
  }

  setTimeout(() => {
    loading.value = false
    submitted.value = true
  }, 500)
}

function resetForm() {
  form.value = {
    service: 'CHATBOT_IA',
    platforms: ['WhatsApp', 'Excel o Hojas de Cálculo'],
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
  text-align: center;
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
  font-size: 1.35rem;
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
  line-height: 1.5;
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
  gap: 0.35rem;
  padding: 1.25rem 1rem;
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 0.75rem;
  background: rgba(255, 255, 255, 0.02);
  cursor: pointer;
  transition: all 0.2s ease;
  user-select: none;
  text-align: center;
}

.platform-card.selected {
  background: rgba(37, 99, 235, 0.15);
  border-color: #2563eb;
}

.platform-icon {
  font-size: 1.75rem;
}

.platform-name {
  font-size: 0.9rem;
  font-weight: 700;
}

.platform-sub {
  font-size: 0.75rem;
  color: #9ca3af;
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
  line-height: 1.5;
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
  font-size: 1.05rem;
  font-weight: 700;
}

.price-amount {
  font-size: 1.5rem;
  color: #60a5fa;
}

.price-note {
  font-size: 0.85rem;
  color: #94a3b8;
  margin-top: 0.5rem;
  line-height: 1.5;
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
  line-height: 1.6;
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
