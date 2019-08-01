<template>
    <v-layout fill-height column justify-center>
        <v-flex mb-3 v-for="recipe in recipes" :key="recipe.id"  xs12 sm8 md6>
            <recipe :recipe="recipe"></recipe>
        </v-flex>
        

        <v-dialog width="60%" v-model="dialog">
            <v-card>

                <v-card-title>
                    <h2 class="heading"> Create a new recipe </h2>
                </v-card-title>

                <v-card-text>
                    <v-layout column justify-start>
                        <v-flex xs12 sm8 md6>
                            <v-text-field v-model="title" clearable box autofocus label="Title" name="title"></v-text-field>
                        </v-flex>

                        <v-flex xs12 sm8 md6>
                            <v-textarea
                            name="content"
                            label="write your recipe here"
                            auto-grow
                            v-model="content"
                            box
                            ></v-textarea>
                        </v-flex>

                    </v-layout>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn dark color="blue" @click="storeRecipe">create</v-btn>
                    <v-btn dark color="red" @click="dialog = false">cancel</v-btn>
                </v-card-actions>

            </v-card>
        </v-dialog>

            <v-layout>
            <v-flex xs5>
                <v-btn
                fab
                dark
                small
                fixed
                bottom
                left
                color="red"
                @click.stop="dialog = true"
                >
                    <v-icon>add</v-icon>
                </v-btn>
            </v-flex>
        </v-layout>

    </v-layout>
</template>

<script>
export default {

    data(){
        return {
            /* v-dialog activator */
            dialog: false,
            Updatedialog: false,

            /* new recipe data */
            title: '',
            content: '',

            /* to be updated recipe data */
            recipe: {}
        }
    },

    computed: {
        recipes(){
            return this.$store.getters.getRecipes;
        }
    },

    methods: {
        storeRecipe(){
            this.$store.dispatch('storeRecipe', { title: this.title, content: this.content});
            this.dialog = false;
        },
    },

    mounted(){
        this.$store.dispatch('loadAllRecipes');
        //checkIfAuthenticated
        this.$store.dispatch('checkUser');
    }
}
</script>
