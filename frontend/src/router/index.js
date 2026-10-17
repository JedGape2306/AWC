import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ServicesView from '../views/ServicesView.vue'
import CotizadorView from '../views/CotizadorView.vue'
import AboutView from '../views/AboutView.vue'
import AdminDashboardView from '../views/AdminDashboardView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/servicios',
    name: 'servicios',
    component: ServicesView
  },
  {
    path: '/cotizador',
    name: 'cotizador',
    component: CotizadorView
  },
  {
    path: '/nosotros',
    name: 'nosotros',
    component: AboutView
  },
  {
    path: '/admin',
    name: 'admin',
    component: AdminDashboardView
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior() {
    return { top: 0 }
  }
})

export default router
