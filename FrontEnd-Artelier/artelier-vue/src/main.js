 
import '@/assets/css/tailwind.css'
import '@/assets/fontawesome/css/font-awesome.css'

import Vue from 'vue'
import App from './App.vue'
import router from './router/index'
import store from './store/index'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faUserSecret)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')