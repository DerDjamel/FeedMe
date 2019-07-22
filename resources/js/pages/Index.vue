<template>
    <v-layout fill-height column justify-center>
        <v-flex mb-3 v-for="recipe in recipes" :key="recipe.id"  xs12 sm8 md6>
            <v-card>
                <v-card-title primary-title>
                    <div>
                        <h3 class="headline mb-0"> {{ recipe.title }} </h3>
                        <h6 class="subheading mt-1 font-weight-black"> {{ recipe.user.name }} </h6>
                    </div>
                </v-card-title>

                <v-card-text>
                    <p> {{ recipe.content }} </p>
                </v-card-text>

                <v-card-actions>
                    <v-btn flat color="orange">read</v-btn>
                    <v-btn flat color="red" @click="destroy(recipe.id)">delete</v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>
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
                @click="dialog = true"
                >
                    <v-icon>add</v-icon>
                </v-btn>
            </v-flex>
        </v-layout>

        <v-dialog width="50%" v-model="dialog">
            <v-card>
                <v-card-title>
                    <h2 class="heading"> Create a new recipe </h2>
                </v-card-title>

                <v-card-text>
                    
                </v-card-text>

                <v-card-actions>
                    <v-btn dark color="blue" @click="storeRecipe">create</v-btn>
                    <v-btn dark color="red" @click="dialog = flase">cancel</v-btn>
                </v-card-actions>

            </v-card>
        </v-dialog>    

    </v-layout>
</template>

<script>
export default {

    data(){
        return {
            dialog: false
        }
    },

    computed: {
        recipes(){
            return this.$store.getters.getRecipes;
        }
    },

    methods: {
        destroy(recipeID){
            this.$store.dispatch('destroyRecipe', recipeID);
        },

        storeRecipe(){
            this.$store.dispatch('storeRecipe', { title: 'djamel', content: 'djamel2'});
        }
    },

    mounted(){
        this.$store.dispatch('loadAllRecipes');
    }
}
</script>
