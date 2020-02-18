import Vue from 'vue';
import Vuex from 'vuex';
// Import local storage
import localStorage from '~/services/localStorage';

import profile from './profile';

Vue.use(Vuex);

export default new Vuex.Store({
    strict: true,
    state: {
        globalUser: localStorage.get('auth')
    },
    getters: {
        globalAuth(state) {
            return state.globalUser
        }
    },
    mutations: {
        SET_GLOBAL_AUTH: (state, payload) => {
            localStorage.set('auth', payload);
            state.globalUser = localStorage.get('auth');
        },
        GLOBAL_LOGOUT: (state) => {
            localStorage.clear();
            state.globalUser = [];
        }
    },
    actions: {
        setGlobalAuth({commit}, payload) {
            return new Promise((resolve, reject) => {
                commit('SET_GLOBAL_AUTH', payload);
                resolve();
            }).then(() => {
                // console.log('Yay! updateAuth')
            }).catch((error) => {
                // console.log(error.response);
                reject();
            });
        },
        globalLogout({commit}) {
            commit('GLOBAL_LOGOUT');
        }
    },
    modules: {
        profile: profile,
    }
});
