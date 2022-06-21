import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'

import Layout from '@/views/Layout.vue'
import Login from '@/views/Login.vue'
import Admin from '@/views/Admin.vue'
import CreatePost from '@/components/CreatePost.vue'
import LogoutComponent from '@/components/LogoutComponent.vue'
const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    component: Layout,

  },
  {
    path: '/login',
    name:'login',
    component: Login,

  },
  {
    path: '/admin-page',
    name:'admin',
    component: Admin,

  },
  {
    path: '/blogs/create',
    name: 'blogs.create',
    component: CreatePost,

  },
  {
    path: '/logout',
    name: 'logout',
    component: LogoutComponent
  }


]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
