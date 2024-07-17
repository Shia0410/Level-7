import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import ItemManager from '../components/ItemManager.vue'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'home',
    component: ItemManager
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

export default router