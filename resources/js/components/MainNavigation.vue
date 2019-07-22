<template>
    <v-toolbar dense flat color="red" dark>
        <!--<v-toolbar-side-icon></v-toolbar-side-icon>-->
        <v-toolbar-title>FeedMe</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items v-if="!authenticated" class="hidden-sm-and-down">
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

export default {
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
            axios.get('/logout').then( res => {
                console.log(res.data);
            });
        }
    }
}
</script>
