<template>
<v-container>
  <form  @submit.prevent="createCat">
    <h1>Create new Category</h1>
    <div>
    <v-text-field
      v-model="form.name"
      label="Category"
      required
    ></v-text-field>    
    <v-btn color="purple" outline @click="update" round v-if="editC">Update</v-btn>
    <v-btn color="#3490dc" outline type="submit" round v-else>Create</v-btn>
    </div>
  </form>
  <v-card class="mt-5">
        <v-toolbar color="#3490dc" dark dense>
            <v-toolbar-title>Categories</v-toolbar-title>
        </v-toolbar>
        <v-list expand>
            <div v-for="(category,index) in categories" :key="category.id">
            <v-list-tile>
                <v-list-tile-content>
                    <v-list-tile-title><strong>{{category.name}}</strong></v-list-tile-title>
                </v-list-tile-content>
                <v-spacer></v-spacer>
                <v-list-tile-action>
                    <v-btn outline round icon color="#3490dc" @click="edit(index)">
                    <v-icon >edit</v-icon>
                </v-btn>
                </v-list-tile-action>
                <v-list-tile-action>
                    <v-btn outline round icon color="error" @click="dlt(category.slug)">
                    <v-icon >clear</v-icon>
                </v-btn>
                </v-list-tile-action>
            </v-list-tile>
            <v-divider></v-divider>
            </div>
        </v-list>
    </v-card>
</v-container>
</template>
<script>
export default {
    data(){
        return{
            form :{
                name: null
            },
            categories : null,
            editC: false,
            slug: null
        }
    },
    methods:{
        createCat(){
            axios.post(`/api/category`,this.form)
            .then(res => {
                this.getCat()
                this.form.name = null
            })
            .catch(err => console.log(err.response.data))
        },
        edit(i){
            this.form.name = this.categories[i].name
            this.editC = true
            this.slug = this.categories[i].slug
        },
        dlt(slug){
            axios.delete(`/api/category/${slug}`)
            .then(res => this.getCat())
        },
        getCat(){
            axios.get('/api/category')
            .then(res => this.categories = res.data.data)
            .catch(err => console.log(err.response.data))
        },
        update(){
            axios.patch(`/api/category/${this.slug}`,this.form)
            .then(res => {
                this.getCat()
                this.form.name = null
                this.editC = false
            })
            .catch(err => console.log(err.response.data))
        }
    },
    created(){
        if(!User.Admin()){
            this.$router.push({name: 'forum'})
        }
        this.getCat()
    },

}
</script>
