import Vue from 'vue';
import Vuex from 'vuex';
import profile from './profile';
Vue.use(Vuex);

export default new Vuex.Store({
    strict: true,
    modules: {
        profile: profile
    }
});
