<template>
    <v-container>
        <form  @submit.prevent="create">
            <h1>ASk QuEsTioN</h1>
            <div>
            <v-text-field
            v-model="form.title"
            label="Title"
            required
            ></v-text-field>
            <v-autocomplete
            :items="categories"
            v-model="form.category_id"
            item-text="name"
            item-value="id"
            label="Category"
            >
            </v-autocomplete>
<markdown-editor v-model="form.body"></markdown-editor>

            <v-btn color="#3490dc" type="submit" round>Create</v-btn>
            </div>
        </form>
    </v-container>
</template>

<script>
import Axios from 'axios';
export default {
    data(){
        return{
            form: {
                title: null,
                category_id: null,
                body: null
                
            },
            categories:null
        }
    },
    created(){
        Axios.get('/api/category')
            .then(res => this.categories = res.data.data)
            .catch(err => console.log(err.response.data))
    },
    methods:{
        create(){
            Axios.post('/api/question',this.form)
            .then(res => this.$router.push(res.data.path))
            .catch(err => console.log(err.response.data))
        }
    }

}
</script>

<style>

</style>
