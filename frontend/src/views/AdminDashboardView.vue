<template>
  <div class="admin-page">
    <div class="container py-8">
      <div class="admin-header">
        <div>
          <span class="badge">Uso Interno del Equipo</span>
          <h1 class="page-title">Solicitudes de Clientes</h1>
          <p class="page-subtitle">Revisa los negocios que han pedido cotización o informes en la página.</p>
        </div>
        <div class="header-actions">
          <button @click="refreshLeads" class="btn-secondary btn-sm">Actualizar Lista</button>
        </div>
      </div>

      <!-- Quick stats -->
      <div class="stats-grid">
        <div class="stat-card card-glass">
          <span class="stat-num">{{ leads.length }}</span>
          <span class="stat-label">Total de Solicitudes</span>
        </div>
        <div class="stat-card card-glass">
          <span class="stat-num text-amber">{{ pendingCount }}</span>
          <span class="stat-label">Por Atender</span>
        </div>
        <div class="stat-card card-glass">
          <span class="stat-num text-blue">{{ analyzingCount }}</span>
          <span class="stat-label">En Revisión</span>
        </div>
        <div class="stat-card card-glass">
          <span class="stat-num text-green">{{ quotedCount }}</span>
          <span class="stat-label">Propuesta Enviada</span>
        </div>
      </div>

      <!-- Leads Table -->
      <div class="table-card card-glass">
        <div class="table-controls">
          <input 
            type="text" 
            v-model="searchQuery" 
            placeholder="Buscar por cliente, negocio o folio..." 
            class="form-input search-input"
          />
          <select v-model="filterStatus" class="form-input filter-select">
            <option value="TODOS">Todos los estados</option>
            <option value="Pendiente">Por Atender</option>
            <option value="En Análisis">En Revisión</option>
            <option value="Cotizado">Propuesta Enviada</option>
            <option value="Aprobado">Aprobado / Cliente Activo</option>
          </select>
        </div>

        <div class="table-responsive">
          <table class="leads-table">
            <thead>
              <tr>
                <th>Folio</th>
                <th>Cliente / Negocio</th>
                <th>¿Qué le interesa?</th>
                <th>Herramientas</th>
                <th>Estimado</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="lead in filteredLeads" :key="lead.folio">
                <td class="font-mono text-cyan">{{ lead.folio }}</td>
                <td>
                  <div class="client-cell">
                    <strong>{{ lead.name }}</strong>
                    <span>{{ lead.company || 'Particular' }}</span>
                  </div>
                </td>
                <td>{{ lead.service }}</td>
                <td>
                  <div class="plat-tags">
                    <span v-for="(p, i) in lead.platforms" :key="i" class="tag">{{ p }}</span>
                  </div>
                </td>
                <td class="font-bold">${{ lead.price.toLocaleString() }} MXN</td>
                <td>
                  <span class="status-badge" :class="getStatusClass(lead.status)">
                    {{ lead.status }}
                  </span>
                </td>
                <td>
                  <button @click="openModal(lead)" class="btn-secondary btn-xs">Ver Datos</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Lead Detail Modal -->
      <div v-if="selectedLead" class="modal-backdrop" @click.self="selectedLead = null">
        <div class="modal-card card-glass">
          <div class="modal-header">
            <h3>Detalle del Cliente: {{ selectedLead.folio }}</h3>
            <button @click="selectedLead = null" class="close-btn">&times;</button>
          </div>
          <div class="modal-body">
            <div class="detail-row">
              <span class="d-label">Contacto:</span>
              <span class="d-val">{{ selectedLead.name }} — Tel / WhatsApp: <strong>{{ selectedLead.phone }}</strong> ({{ selectedLead.email }})</span>
            </div>
            <div class="detail-row">
              <span class="d-label">Negocio o Local:</span>
              <span class="d-val">{{ selectedLead.company || 'No especificado' }}</span>
            </div>
            <div class="detail-row">
              <span class="d-label">Solución que le interesa:</span>
              <span class="d-val">{{ selectedLead.service }}</span>
            </div>
            <div class="detail-row">
              <span class="d-label">Herramientas que usa:</span>
              <span class="d-val">{{ selectedLead.platforms.join(', ') }}</span>
            </div>
            <div class="detail-row">
              <span class="d-label">Presupuesto Estimado:</span>
              <span class="d-val text-blue font-bold">${{ selectedLead.price.toLocaleString() }} MXN</span>
            </div>
            <div class="detail-row">
              <span class="d-label">Lo que platicó sobre su problema:</span>
              <p class="d-text">{{ selectedLead.details || 'Sin notas adicionales.' }}</p>
            </div>
            
            <div class="status-edit">
              <label>Cambiar Estado de Atención:</label>
              <select v-model="selectedLead.status" class="form-input">
                <option value="Pendiente">Por Atender</option>
                <option value="En Análisis">En Revisión</option>
                <option value="Cotizado">Propuesta Enviada</option>
                <option value="Aprobado">Aprobado / Cliente Activo</option>
                <option value="Descartado">Descartado</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button @click="saveLeadStatus" class="btn-primary btn-sm">Guardar y Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'

const searchQuery = ref('')
const filterStatus = ref('TODOS')
const selectedLead = ref(null)
const loading = ref(false)

const initialMockLeads = [
  {
    folio: 'AUT-847291',
    name: 'Roberto Gómez',
    company: 'Distribuidora Huasteca',
    email: 'roberto@huastecadist.com',
    phone: '481 102 3344',
    service: 'Asistente para atender en WhatsApp',
    platforms: ['WhatsApp', 'Excel o Hojas de Cálculo'],
    price: 3600,
    status: 'Pendiente',
    details: 'Queremos automatizar el catálogo de productos y toma de pedidos por WhatsApp con respuesta rápida a clientes.'
  },
  {
    folio: 'AUT-652190',
    name: 'Carla Mendoza',
    company: 'Clínica Dental San Ángel',
    email: 'contacto@dentalsanangel.com',
    phone: '481 998 7766',
    service: 'Conectar mis programas para ahorrar tiempo',
    platforms: ['WhatsApp', 'Correo Electrónico', 'Excel'],
    price: 4800,
    status: 'En Análisis',
    details: 'Guardar citas de pacientes y enviar recordatorio automático por WhatsApp 24 horas antes.'
  }
]

const leads = ref([...initialMockLeads])

async function fetchLeads() {
  loading.value = true
  let serverLeads = []

  // 1. Intentar cargar desde MySQL mediante la API en PHP
  try {
    const res = await fetch('http://localhost:8080/index.php?action=leads')
    const data = await res.json()
    if (data.success && Array.isArray(data.leads)) {
      serverLeads = data.leads
    }
  } catch (err) {
    console.warn('API Docker no disponible, usando respaldo local:', err)
  }

  // 2. Cargar cotizaciones guardadas en localStorage
  let localLeads = []
  try {
    localLeads = JSON.parse(localStorage.getItem('autemia_local_leads') || '[]')
  } catch (e) {
    console.warn('Error leyendo localStorage:', e)
  }

  // 3. Combinar sin duplicar folios (priorizando servidor MySQL)
  const combined = [...serverLeads]
  const existingFolios = new Set(serverLeads.map(l => l.folio))

  localLeads.forEach(l => {
    if (!existingFolios.has(l.folio)) {
      combined.push(l)
      existingFolios.add(l.folio)
    }
  })

  // Agregar ejemplos si está vacío
  initialMockLeads.forEach(mock => {
    if (!existingFolios.has(mock.folio)) {
      combined.push(mock)
      existingFolios.add(mock.folio)
    }
  })

  leads.value = combined
  loading.value = false
}

onMounted(() => {
  fetchLeads()
})

const pendingCount = computed(() => leads.value.filter(l => l.status === 'Pendiente').length)
const analyzingCount = computed(() => leads.value.filter(l => l.status === 'En Análisis').length)
const quotedCount = computed(() => leads.value.filter(l => l.status === 'Cotizado').length)

const filteredLeads = computed(() => {
  return leads.value.filter(lead => {
    const matchesSearch = 
      (lead.name || '').toLowerCase().includes(searchQuery.value.toLowerCase()) ||
      (lead.company || '').toLowerCase().includes(searchQuery.value.toLowerCase()) ||
      (lead.folio || '').toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesFilter = filterStatus.value === 'TODOS' || lead.status === filterStatus.value
    return matchesSearch && matchesFilter
  })
})

function getStatusClass(status) {
  if (status === 'Pendiente') return 'status-amber'
  if (status === 'En Análisis') return 'status-blue'
  if (status === 'Cotizado') return 'status-green'
  return 'status-purple'
}

function openModal(lead) {
  selectedLead.value = lead
}

async function saveLeadStatus() {
  if (!selectedLead.value) return

  // Actualizar en backend MySQL
  try {
    await fetch('http://localhost:8080/index.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        action: 'update_status',
        folio: selectedLead.value.folio,
        status: selectedLead.value.status
      })
    })
  } catch (e) {
    console.warn('Error sincronizando estado con API:', e)
  }

  // Actualizar en localStorage
  try {
    const local = JSON.parse(localStorage.getItem('autemia_local_leads') || '[]')
    const item = local.find(l => l.folio === selectedLead.value.folio)
    if (item) {
      item.status = selectedLead.value.status
      localStorage.setItem('autemia_local_leads', JSON.stringify(local))
    }
  } catch (e) {}

  selectedLead.value = null
}

function refreshLeads() {
  fetchLeads()
}
</script>

<style scoped>
.admin-page {
  padding: 2.5rem 0;
}

.admin-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  margin-bottom: 2.5rem;
}

.page-title {
  font-size: 2.2rem;
  font-weight: 800;
  margin: 0.5rem 0 0.25rem;
}

.page-subtitle {
  color: #9ca3af;
  font-size: 0.95rem;
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.stat-card {
  padding: 1.5rem;
  display: flex;
  flex-direction: column;
}

.stat-num {
  font-size: 2rem;
  font-weight: 800;
}

.stat-label {
  font-size: 0.85rem;
  color: #9ca3af;
  margin-top: 0.25rem;
}

.text-amber { color: #f59e0b; }
.text-blue { color: #38bdf8; }
.text-green { color: #10b981; }

.table-card {
  padding: 1.5rem;
}

.table-controls {
  display: flex;
  gap: 1rem;
  margin-bottom: 1.5rem;
}

.search-input {
  max-width: 400px;
}

.filter-select {
  max-width: 200px;
}

.leads-table {
  width: 100%;
  border-collapse: collapse;
  text-align: left;
  font-size: 0.9rem;
}

.leads-table th {
  padding: 0.85rem 1rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  color: #94a3b8;
  font-weight: 600;
  font-size: 0.8rem;
  text-transform: uppercase;
}

.leads-table td {
  padding: 1rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.04);
}

.client-cell {
  display: flex;
  flex-direction: column;
}

.client-cell span {
  font-size: 0.8rem;
  color: #9ca3af;
}

.plat-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 0.35rem;
}

.tag {
  background: rgba(255, 255, 255, 0.06);
  padding: 0.2rem 0.5rem;
  border-radius: 0.25rem;
  font-size: 0.75rem;
  color: #cbd5e1;
}

.status-badge {
  display: inline-block;
  padding: 0.25rem 0.65rem;
  border-radius: 9999px;
  font-size: 0.75rem;
  font-weight: 700;
}

.status-amber { background: rgba(245, 158, 11, 0.15); color: #fbbf24; }
.status-blue { background: rgba(56, 189, 248, 0.15); color: #38bdf8; }
.status-green { background: rgba(16, 185, 129, 0.15); color: #34d399; }

.btn-xs {
  padding: 0.4rem 0.75rem;
  font-size: 0.8rem;
}

/* Modal */
.modal-backdrop {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.75);
  backdrop-filter: blur(6px);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 200;
}

.modal-card {
  width: 550px;
  max-width: calc(100vw - 2rem);
  padding: 2rem;
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  padding-bottom: 0.75rem;
}

.modal-body {
  display: flex;
  flex-direction: column;
  gap: 0.85rem;
  font-size: 0.9rem;
}

.detail-row {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}

.d-label {
  font-size: 0.75rem;
  color: #64748b;
  text-transform: uppercase;
  font-weight: 700;
}

.d-val {
  color: #e2e8f0;
}

.d-text {
  background: rgba(255, 255, 255, 0.03);
  padding: 0.75rem;
  border-radius: 0.5rem;
  color: #cbd5e1;
  font-size: 0.85rem;
}

.status-edit {
  margin-top: 1rem;
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
}

.modal-footer {
  margin-top: 1.5rem;
  display: flex;
  justify-content: flex-end;
}

@media (max-width: 800px) {
  .stats-grid { grid-template-columns: 1fr 1fr; }
  .table-responsive { overflow-x: auto; }
}
</style>
