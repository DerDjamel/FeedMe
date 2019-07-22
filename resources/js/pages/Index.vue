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
                    <v-btn flat color="blue" @click="updateRecipeDialog(recipe)">update</v-btn>
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
                @click.stop="dialog = true"
                >
                    <v-icon>add</v-icon>
                </v-btn>
            </v-flex>
        </v-layout>

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

        <v-dialog width="60%" v-model="Updatedialog">
            <v-card>

                <v-card-title>
                    <h2 class="heading"> update the recipe </h2>
                </v-card-title>

                <v-card-text>
                    <v-layout column justify-start>
                        <v-flex xs12 sm8 md6>
                            <v-text-field v-model="recipe.title" clearable box autofocus label="Title" name="title"></v-text-field>
                        </v-flex>

                        <v-flex xs12 sm8 md6>
                            <v-textarea
                            name="content"
                            label="write your recipe here"
                            auto-grow
                            box
                            v-model="recipe.content"
                            ></v-textarea>
                        </v-flex>

                    </v-layout>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn dark color="blue" @click="updateRecipe">Update</v-btn>
                    <v-btn dark color="red" @click="Updatedialog = false">cancel</v-btn>
                </v-card-actions>

            </v-card>
        </v-dialog>     

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
        updateRecipeDialog(recipe){
            this.recipe = recipe
            this.Updatedialog = true;
        },

        destroy(recipeID){
            this.$store.dispatch('destroyRecipe', recipeID);
        },

        storeRecipe(){
            this.$store.dispatch('storeRecipe', { title: this.title, content: this.content});
            this.dialog = false;
        },

        updateRecipe(recipe){
            this.$store.dispatch('updateRecipe', {  id: this.recipe.id, 
                                                    title: this.recipe.title, 
                                                    content: this.recipe.content});
            this.Updatedialog = false;
        }
    },

    mounted(){
        this.$store.dispatch('loadAllRecipes');
    }
}
</script>
