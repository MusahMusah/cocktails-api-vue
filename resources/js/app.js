require('./bootstrap');
// window.Vue = require('vue');
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './app/App';
import { routes } from './app/routes';
import { store } from './app/store';
// require('./subscriber')
import VueFileAgent from 'vue-file-agent';
import VueFileAgentStyles from 'vue-file-agent/dist/vue-file-agent.css';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

Vue.component('v-select', vSelect)
Vue.use(VueFileAgent);
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

const options = {
    // You can set your default options here
};
Vue.use(Toast, options);
// Import component
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
// Init plugin
Vue.use(Loading, {
    loader: 'spinner',
    color: '#7367F0',
    opacity: 0.2,
});
require("bootstrap-css-only/css/bootstrap.min.css");
require("mdbvue/lib/css/mdb.min.css");
require("@fortawesome/fontawesome-free/css/all.min.css");

const router = new VueRouter({
    routes,
    mode : 'history',
});
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!store.state.token) {
        next({
          name: 'login',
        })
      } else {
        next()
      }
    } else if (to.matched.some(record => record.meta.requiresVisitor)) {
      if (store.state.token) {
        next({
          name: 'dashboard',
        })
      } else {
        next()
      }
    } else {
      next()
    }
})
// store.dispatch('attempLogin', localStorage.getItem('token')).then(() => {
const app = new Vue({
    el: '#app',
    router: router,
    store: store,
    created() {
    axios.interceptors.response.use(
        response => response,
        error => {
            console.log(error.response)
            if (error.response.status === 401) {
            localStorage.removeItem('token')
            this.$router.replace('/login')
            // this.$store.dispatch('logout')
            }
            return Promise.reject(error)
        }
        )
    },
    render : app => app(App),
})
// })
