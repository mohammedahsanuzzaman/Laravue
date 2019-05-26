<template>
    <div>
        <markdown-editor v-model="body"></markdown-editor>
        <v-spacer></v-spacer>
        <v-btn color="#3490dc" round outline @click="reply" class="d-block mx-auto">Reply</v-btn>
    </div>
</template>

<script>
export default {
    props:['qSlug'],
    data(){
        return{
            body: null
        }
    },
    methods:{
        reply(){
            if(this.body != null){
            axios.post(`/api/question/${this.qSlug}/reply`,{body: this.body})
            .then(res=>{
                this.body = ''
                EventBus.$emit('newReply')
                window.scrollTo(0,0)
            })
            .catch(err => console.log(err.response.data))
            }
            else{
                alert('Type Something first ! -_-')
            }
        }
    }

}
</script>

<style>

</style>
