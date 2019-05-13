<template>
    <v-container>
        <edit-question v-if="editting" :data =question></edit-question>
        <div v-else><show-question :data =question v-if="question"></show-question></div>
        <replies v-if="question" :replies="question.replies"></replies>
        <div v-if="loggedin">
            <new-reply v-if="question" :qSlug="question.slug"></new-reply>
        </div>
    </v-container>
</template>

<script>
import ShowQuestion from './ShowQuestion.vue';
import EditQuestion from './EditQuestion.vue';
import Replies from '../replies/Replies.vue'
import NewReply from '../replies/NewReply.vue'
export default {
    components:{ShowQuestion,EditQuestion,Replies,NewReply},
    data(){
        return{
            question: null,
            editting : false,
            loggedin : User.loggedIn()
        }
    },
    created(){
        this.edit()
        this.getQ()
        this.newReply()
        this.dltReply()
        this.saveReply()
        
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
        },
        newReply(){
            EventBus.$on('newReply',()=>{
            this.getQ();
            })
        },
        dltReply(){
            EventBus.$on('dltReply', (id)=>{
                axios.delete(`/api/question/${this.question.slug}/reply/${id}`)
                .then(res =>{
                    this.getQ()
                })
            })

            Echo.private('App.User.' + User.id())
            .notification((notification) => {
                this.replies.unshift(notification.reply)
        });
        },
        saveReply(){
            EventBus.$on('svEdit',() =>{
                this.getQ()
            })
        }
    }
}
</script>

<style>

</style>
