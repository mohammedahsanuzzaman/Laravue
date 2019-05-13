<template>
    <v-container fluid grid-list-md >
        <v-layout align-center justify-center row wrap class="h8">
            <v-flex  class="px-5" xs12 sm12 md5>
                <h1 :class="{'display-3 font-weight-bold': $vuetify.breakpoint.sm || $vuetify.breakpoint.md || $vuetify.breakpoint.lg || $vuetify.breakpoint.xs}">Ask Questions <br> Get Answers
                </h1>
                <p :class="{'title font-weight-light': $vuetify.breakpoint.md || $vuetify.breakpoint.lg || $vuetify.breakpoint.xl}">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam assumenda ea quo cupiditate facere deleniti fuga officia.</p>
                <div>
                    <router-link to="/login"><v-btn :large="$vuetify.breakpoint.xs ? false : true" outline color="#3490dc" round>Log In</v-btn></router-link>
                    <router-link to="/signup"><v-btn :large="$vuetify.breakpoint.xs ? false : true" outline color="#3490dc" round>Sign Up</v-btn></router-link>
                </div>
            </v-flex>
            <v-flex class="px-5"  xs12 sm12 md7>
                <img src="images/landing_1.png" alt="img">
            </v-flex>
        </v-layout>
         <h1 class="mx-auto d-block text-xs-center font-weight-black display-2">Features</h1>
        <v-layout align-center row wrap class="mt-5 px-5">
          <v-flex xs12 sm6 md4  v-for="card in cards" :key="card.title">
            <v-hover>
                <v-card class="card_h8" slot-scope="{ hover }"
      :class="`elevation-${hover ? 12 : 2}`">
                    <v-card-actions> 
                        <h1>
                        <v-icon>{{card.logo}}</v-icon>    </h1>         
                    </v-card-actions>
                    <v-card-title primary-title>
                        <div class="px-3">
                        <div class="headline">{{card.title}}</div>
                        <span>{{card.body}}</span>
                        </div>
                    </v-card-title>
                </v-card>
            </v-hover>
          </v-flex>
        </v-layout>

    </v-container>
</template>

<script>
export default {
    data(){
        return{
            cards : [
                {
                    title : 'Ask Questions', 
                    body: 'Ask any question  you have and get answers from other users', 
                    logo: 'fa fa-question-circle-o'
                },
                {
                    title : 'Reply to Others', 
                    body: 'Reply to others who have questions on any topic.', 
                    logo: 'reply'
                },
                {
                    title : 'Variety of Topics', 
                    body: 'There are lots of topics available for you to ask questions about', 
                    logo: 'list'
                },
            ]
        }
    }
}
</script>
<style lang="scss" scoped>
.h8{
    min-height: 90vh;
}
img{
    width: 100%;
}
.card_h8{
    height: 225px;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column
}
</style>
