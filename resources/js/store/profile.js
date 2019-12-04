import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

const profile = {
    state: {
        profile: {}
    },
    mutations: {
        updateAuth: (state, payload) => {
            state.profile = payload;
        }
    },
    actions: {
        authStore:(context, payload) => {
            return new Promise((resolve, reject) => {
                context.commit('updateAuth', payload);
                resolve()
            });
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
