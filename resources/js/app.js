/*require('./bootstrap');*/


import Vue from 'vue';
window.axios = require('axios');

import i18n from 'vue-i18n';

Vue.use(i18n);

window.NProgress = require('nprogress');
import App from './App';

Vue.prototype.$baseURL = 'http://127.0.0.1:8000/api/v1/';
// router setup
import routers from './routes';

/**
 * Import third party plugins
 */
import './global/rules';
import './global/notificaitons';
import './global/elements';
import './global/loading';

import localStorage from './services/localStorage';

Vue.prototype.$localStorage = localStorage;


/* eslint-disable no-new */
const app = new Vue({
    el: '#wrapper',
    render: h => h(App),
    router : routers
});
