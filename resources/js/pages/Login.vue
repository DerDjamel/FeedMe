<template>
    <v-layout justify-center align-center column>
        <v-flex xs12 md8 mb-3 text-xs-center>
            <h2 >Login Page</h2>
        </v-flex>

        <v-divider></v-divider>

        <v-flex xs12>
            <v-form  ref="loginForm">
                    <v-layout justify-center align-center column>
                        <v-flex>
                            <v-text-field v-model="email" name="email" type="email" label="e-mail" autofocus clearable></v-text-field>
                        </v-flex>

                        <v-flex>
                            <v-text-field v-model="password" name="password" type="password" label="password" clearable></v-text-field>
                        </v-flex>

                    </v-layout>
            </v-form>
        </v-flex>

        <v-flex xs12>
            <v-btn color="success">Log in</v-btn>
            <v-btn color="warning" @click="reset">reset</v-btn>
        </v-flex>
        

        
    </v-layout>
</template>

<script>
export default {
    data(){
        return {
            email       : '',
            password    : '',
        };
    },

    methods: {
        reset(){
            this.$refs.loginForm.reset();
        }
    },
}
</script>
