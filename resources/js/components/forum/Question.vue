<template>
    <v-container>
        <edit-question v-if="editting" :data =question></edit-question>
        <div v-else><show-question :data =question v-if="question"></show-question></div>
    </v-container>
</template>

<script>
import ShowQuestion from './ShowQuestion.vue';
import EditQuestion from './EditQuestion.vue';
export default {
    components:{ShowQuestion,EditQuestion},
    data(){
        return{
            question: null,
            editting : false
        }
    },
    created(){
        this.edit()
        this.getQ()
        
    },
    methods:{
        edit(){
            EventBus.$on('edit', ()=>{
                this.editting = !this.editting
            })
            EventBus.$on('cancelEdit', ()=>{
                this.editting = !this.editting
            })
        },
        getQ(){
            axios.get(`/api/question/${this.$route.params.slug}`)
            .then(res=> this.question = res.data.data)
            .catch(err=> console.log(err))
        }
    }
}
</script>

<style>

</style>
