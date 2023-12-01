import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/empresas',
      name: 'EmpresaIndex',
      component: () => import('../views/empresas/EmpresaIndex.vue')
    },
    {
      path: '/empresas/create',
      name: 'EmpresaCreate',
      component: () => import('../views/empresas/EmpresaCreate.vue')
    },
    {
      path: '/empresas/:id/edit',
      name: 'EmpresaEdit',
      component: () => import('../views/empresas/EmpresaEdit.vue'),
      props: true,
    },
    {
      path: '/clientes',
      name: 'ClienteIndex',
      component: () => import('../views/clientes/ClienteIndex.vue')
    },
    {
      path: '/clientes/create',
      name: 'ClienteCreate',
      component: () => import('../views/clientes/ClienteCreate.vue')
    },
    {
      path: '/clientes/:id/edit',
      name: 'ClienteEdit',
      component: () => import('../views/clientes/ClienteEdit.vue'),
      props: true,
    },
  ]
})

export default router;