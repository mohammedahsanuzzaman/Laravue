<template>
    <v-toolbar>
        <router-link to="/"><v-toolbar-title>LaraVue</v-toolbar-title></router-link>
        <v-spacer></v-spacer>
        <div>
            <v-toolbar-items class="hidden-sm-and-down">
                <router-link to="/forum"><v-btn flat>Forum</v-btn></router-link>
                <router-link to="/ask-question"><v-btn flat>Ask Question</v-btn></router-link>
                <router-link to="/categories"><v-btn flat>Categories</v-btn></router-link>
                <router-link to="/login"><v-btn flat>Log in</v-btn></router-link>
            </v-toolbar-items>
        </div>
    </v-toolbar>
</template>

<script>
export default {

}
</script>

<style scoped>
a{
    text-decoration: none;
    
}
button{
    padding: 22px 25px;
}
</style>
