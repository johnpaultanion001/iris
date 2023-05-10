// require('./bootstrap')

import { createApp } from 'vue'
import app from './components/app.vue'
import './axios.js'

import router from './router'

createApp(app).use(router).mount('#app')