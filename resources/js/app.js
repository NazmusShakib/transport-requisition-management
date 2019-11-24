/*require('./bootstrap');*/


import Vue from 'vue';
window.axios = require('axios');

window.NProgress = require('nprogress');
import App from './App';

Vue.prototype.$baseURL = 'http://127.0.0.1:8000/api/v1/';
// router setup
import routers from './routes';

import localStorage from './services/localStorage';

Vue.prototype.$localStorage = localStorage;


/* eslint-disable no-new */
const app = new Vue({
    el: '#wrapper',
    render: h => h(App),
    router : routers
});
