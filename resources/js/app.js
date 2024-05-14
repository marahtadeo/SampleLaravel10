import './bootstrap';
import Vue from 'vue'
import Vuetify from 'vuetify'
import Router from './router'
import store from './store'
import App from './template/App';
import axios from 'axios'
Vue.use(Vuetify)
Vue.use(axios)
const app = new Vue({
    el: '#app',
    store,
    router:Router,
    vuetify: new Vuetify(),
    render: h=>h(App)
});

// import {createApp} from 'vue'

// import App from './App.vue'

// createApp(App).mount("#app")