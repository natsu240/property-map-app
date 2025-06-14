import { createRouter, createWebHistory } from 'vue-router'
import PropertyMap from '../views/PropertyMap.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'property-map',
      component: PropertyMap,
    },
  ],
})

export default router
