import UserApi from '../api/user.js';

export default {
    state: {
        user: {},
        auth: false
    },/* END of state */


    actions: {
        loadUser({ commit }){
            UserApi.getUser().then( res => {
                commit('setUser', res.data);
            });
            commit('setAuth', true);
        },

        logoutUser({ commit }){
            commit('setUser', {});
            commit('setAuth', false);
        },

        checkUser({ commit }){
            UserApi.checkIfAuthenticated().then(({ data }) => {
                commit('setAuth', data.auth);
            });
        },
        
    },/* END of actions */


    mutations: {
        setUser(state, user){
            state.user = user;
        },

        setAuth(state, authState){
            state.auth = authState;
        },
    }, /* End of mutations */


    getters: {
        getUser(state){
            return state.user;
        },

        getAuth(state){
            return state.auth;
        }
        
    }/* End of getters */ 


}