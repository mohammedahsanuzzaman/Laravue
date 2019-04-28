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
                <categories></categories>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import Axios from 'axios';
import Questions from './Questions.vue'
import Categories from './Categories.vue'
export default {
    components:{ Questions, Categories},
    data(){
        return{
            questions: {}
        }
    }
    ,
    created(){
        Axios.get('/api/question')
        .then(res=> this.questions = res.data.data)
        .catch(err=> console.log(err))
    }
}
</script>

<style>

</style>
