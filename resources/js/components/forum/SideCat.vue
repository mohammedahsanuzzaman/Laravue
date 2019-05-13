<template>
    <v-card>
        <v-toolbar color="#3490dc" dark dense>
            <v-toolbar-title>Categories</v-toolbar-title>
        </v-toolbar>
        <v-list>
            <v-list-tile outline v-for="category in categories" :key="category.id">
                <v-list-tile-content>
                    <v-list-tile-title>{{category.name}}</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-card>
</template>

<script>
export default {
    data(){
        return{
            categories: null
        }
    },
    created(){
        
        axios.get('/api/category')
            .then(res => this.categories = res.data.data)
            .catch(err => console.log(err.response.data))
    }
}
</script>

<style>

</style>
