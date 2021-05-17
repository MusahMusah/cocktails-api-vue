import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios'

Vue.use(Vuex);

export const store = new Vuex.Store({
    getters : {
        getUserData (state) {
            return state.userData
        },
        loggedIn(state) {
            return state.token !== null
        },
    },
    state : {
        userData : [],
        token: localStorage.getItem('token') || '',
        allIngredients: [],
    },
    mutations : {
        setToken (state, token) {
            localStorage.setItem('token', token)
            state.token = token
        },
        clearToken (state) {
            localStorage.removeItem('token')
            state.token = '';
        },
        setUserData (state, data) {
            state.userData = data
        },
        setIngredients(state, data) {
            state.allIngredients = data.data
        },
    },
    actions: {
        async attempLogin({commit, state}, token) {
            if (token) {
                commit('setToken', token)
            }
            // dont try to validate if token is not found
            if (!state.token) {
            return
            }
            try {
                const response = await Api.get('/api/me')
                commit('setUserData', response.data.user)
            } catch (e) {
                commit('setToken', null)
                commit('setUserData', null)
            }
        },
    }
});
