<template>
    <v-container>
        <form  @submit.prevent="create">
            <h1>Ask Question</h1>
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

            <v-btn color="#3490dc" type="submit" round class="d-block mx-auto" >Create</v-btn>
            </div>
        </form>
    </v-container>
</template>

<script>
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
        axios.get('/api/category')
            .then(res => this.categories = res.data.data)
            .catch(err => console.log(err.response.data))
    },
    methods:{
        create(){
            axios.post('/api/question',this.form)
            .then(res => this.$router.push(res.data.path))
            .catch(err => console.log(err.response.data))
        }
    }

}
</script>

<style>

</style>
