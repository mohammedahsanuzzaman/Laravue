<template>
    <v-container>
        <h1>Replies</h1>
        <reply v-for="reply in replies" :key="reply.id" :data="reply"></reply>
    </v-container>
</template>

<script>
import Reply from './Reply.vue'
export default {
    components: {Reply},
    props:['replies'],
    created(){
        
    }
}
</script>

<style scoped>
h1{
    display: block;
    width: 100%;
    text-align: center;
    padding: 16px 0px;
}
</style>
