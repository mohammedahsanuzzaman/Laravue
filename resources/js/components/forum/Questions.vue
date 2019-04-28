<template>
      <v-card>
        <v-card-title primary-title>
          <div>
            <div class="headline">{{question.title}}</div>
            <span class="grey--text">{{question.user}} - {{question.created_at}}</span>
          </div>
        </v-card-title>

        <v-card-actions>
          <v-btn outline round class="mr-2">Share</v-btn>
          <router-link :to= "question.path"><v-btn outline color="purple" round>Read</v-btn></router-link>
          <v-spacer></v-spacer>
          <v-btn icon @click="show = !show">
            <v-icon>{{ show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
          </v-btn>
        </v-card-actions>

        <v-slide-y-transition>
          <v-card-text v-show="show">
              {{question.body}}
          </v-card-text>
        </v-slide-y-transition>
      </v-card>
</template>

<script>
export default {
    data(){
    return{
        show: false,
        }
    },
    props:['question']
}
</script>

<style>

</style>
