<template>
<v-card-text>
    <div>
        <markdown-editor v-model="this.data.reply"></markdown-editor>
        <div class="flex">
        <v-btn color="success" round outline @click="save" icon> <v-icon>save</v-icon></v-btn>
        <v-btn color="error" round outline @click="cancel" icon> <v-icon>clear</v-icon></v-btn>
        </div>
    </div>
</v-card-text>
</template>

<script>
export default {
    props:['data'],
    methods:{
        save(){
            axios.patch(`/api/question/${this.data.question_slug}/reply/${this.data.id}`,{body: this.data.reply})
            .then(res =>{
                this.cancel()
                EventBus.$emit('svEdit')
            })

        },
        cancel(){
            EventBus.$emit('cnclEdit')
        }
    }
}
</script>
<style scoped>
.flex{
    display: flex;
    justify-content: center
}
</style>
