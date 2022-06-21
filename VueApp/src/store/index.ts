import {createStore} from 'vuex'

export default createStore({
    state: {
        isLoggedIn: !!localStorage.getItem('token')
    },
    mutations: {
        loginUser (state) {
            state.isLoggedIn = true
        },
        logoutUser (state) {
            state.isLoggedIn = false
        },
    },

    getters: {},
    actions: {},
    modules: {}
})
