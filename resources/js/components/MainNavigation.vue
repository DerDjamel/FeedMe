<template>
    <v-toolbar dense flat color="red" dark>
        <!--<v-toolbar-side-icon></v-toolbar-side-icon>-->
        <v-toolbar-title>FeedMe</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items v-if="!auth"  class="hidden-sm-and-down">
            <v-btn  flat v-for="link in links" :key="link.label" :to="link.route">
                <v-icon left small> {{ link.icon }} </v-icon>
                {{ link.label }}
            </v-btn>
        </v-toolbar-items>
    
        <v-toolbar-items v-else class="hidden-sm-and-down">
            
            <v-btn flat>
                {{ user.name }}
            </v-btn>

            <v-btn @click="logout" flat>
                logout
            </v-btn>

        </v-toolbar-items>

  </v-toolbar>
</template>
<script>
import Auth from '../api/auth.js';
export default {
    props: ['auth'],
    data(){
        return {
            /* navigation related */
            links: [
                { label: 'Log in', icon: 'person', route: { name : 'login' } },
                { label: 'Register', icon: 'person_add', route: { name : 'register' } },
            ], /* end of links array */


        };
    },

    computed: {
        authenticated(){
            return this.$store.getters.getAuth;
        },

        user(){
            return this.$store.getters.getUser;
        }
    },

    methods: {
        logout(){
            Auth.logout().then( res => {
                this.$store.dispatch('logoutUser');
                window.location = '/';
            });
        }
    },

    mounted(){
        if(this.auth){
            this.$store.dispatch('loadUser');
        }
    }
  
}
</script>
