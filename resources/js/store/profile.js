import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

const profile = {
    state: {
        profile: {
            'name': 'Nazmus Shakib',
            'email': 'nshakib.se@gmail.com',
        }
    },
    mutations: {
        changeName: state => {
            state.profile.name = 'Aminul Islam';
        }
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
        profile: state => {
            return state.profile;
        }
    }
};

export default profile
