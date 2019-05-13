<template>
    <v-app>
        <toolbar></toolbar>
        <v-content><router-view></router-view></v-content>
        
        <app-footer></app-footer>
    </v-app>
</template>


<script>
    import toolbar from './ToolBar.vue'
    import AppFooter from './AppFooter.vue'

    export default {
        components:{
            toolbar,
            AppFooter
        }
    }
</script>
