import { createApp } from 'vue'
import store from './store'
import App from './App'
// import VueRouter from 'vue-router';
// 
// Vue.use(VueRouter);
// 
// import { routes } from './routes';
// 
// const router = new VueRouter({
//   routes
// })

const AppElement = document.querySelector('#app')

createApp(App, {
  ...AppElement.dataset
  })
  .use(store)
  .mount('#app')

// new Vue({
//     el: '#design',
//     render: h => h(App),
//     // router: router
// });
