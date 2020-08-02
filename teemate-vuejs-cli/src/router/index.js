import Vue from 'vue'
import VueRouter from 'vue-router'
import index from '../views/index.vue'

Vue.use(VueRouter)

const routes = [
	{
		path: '/',
		name: 'index',
		component: index
	},
	{
		path: '/profile',
		name: 'profile',
    
		component: function () {
			return import('../views/profile.vue')
		}
	}
]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

export default router
