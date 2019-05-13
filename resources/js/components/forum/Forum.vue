<template>
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs12 sm8>
                <questions
                v-for="question in questions"
                :key="question.q_id"
                :question= question
                ></questions>
            </v-flex>
            <v-flex xs12 sm4>
                <side-cat></side-cat>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import Questions from './Questions.vue'
// import Categories from './Categories.vue'
import SideCat from './SideCat.vue'
export default {
    components:{ Questions,SideCat},
    data(){
        return{
            questions: {}
        }
    }
    ,
    created(){
        axios.get('/api/question')
        .then(res=> this.questions = res.data.data)
        .catch(err=> Exception.handle(err))
    }
}
</script>

<style>

</style>
