<template>
    <show-question :data =question v-if="question"></show-question>
</template>

<script>
import Axios from 'axios';
import ShowQuestion from './ShowQuestion.vue';
export default {
    components:{ShowQuestion},
    data(){
        return{
            question: null
        }
    },
    created(){
        Axios.get(`/api/question/${this.$route.params.slug}`)
        .then(res=> this.question = res.data.data)
        .catch(err=> console.log(err))
    }
}
</script>

<style>

</style>
