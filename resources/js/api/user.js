import Axios from "axios";

export default {
    getUser(){
        return Axios.get('/api/user');
    },

    checkIfAuthenticated(){
        return Axios.get('/api/user/auth');
    }

}