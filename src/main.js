import { createApp } from 'vue'
import store from '@/store.js'
import App from '@/App.vue'

const AppElement = document.querySelector('#app')

createApp(App, {
  ...AppElement.dataset
  })
  .use(store)
  .mount('#app')
