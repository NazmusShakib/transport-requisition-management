import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        auth: {}
    },
    mutations: {
        auth_request(state) {
            state.status = 'loading'
        },
        auth_success(state, auth) {
            state.status = 'success';
            state.auth = auth;
        },
        logout(state) {
            state.status = '';
            state.auth = '';
        },
        auth_error(state) {
            state.status = 'error'
        },
    },
    actions: {
        authStore({commit}, auth) {
            return new Promise((resolve, reject) => {
                commit('auth_request');
                try {
                    commit('auth_success', auth);
                    resolve()
                } catch (error) {
                    commit('auth_error');
                    reject(error)
                }
            })
        },

        logout({commit}) {
            return new Promise((resolve, reject) => {
                commit('logout');
                resolve()
            })
        }

    },
    getters: {
        //
    }
})
