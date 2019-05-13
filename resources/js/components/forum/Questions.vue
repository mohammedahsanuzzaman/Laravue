<template>
      <v-card>
        <v-card-title primary-title>
          <div>
            <div class="headline">{{question.title}}</div>
            <span class="grey--text">{{question.user}} - {{question.created_at}}</span>
          </div>
        </v-card-title>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn outline round class="mr-2" @click="share" v-if="shareV">Share</v-btn>
          <router-link :to= "question.path"><v-btn outline color="purple" round>Read</v-btn></router-link>
        </v-card-actions>
      </v-card>
</template>

<script>
export default {
    data(){
    return{
        show: false,
        }
    },
    props:['question'],
    methods:{
      async share() {
            if(navigator.share){
                try {
                    await navigator.share({ title: this.question.title, url: `https://laravue-forum.herokuapp.com/${this.question.path}` });
                } 
                catch (err) {
                    // eslint-disable-next-line
                    console.error("Share failed:", err.message);
                }
            }else{
                alert('your browser is not supported')
            }  
        }
    },
    computed:{
      shareV(){
        return navigator.share ? true:false
      }
    }
}
</script>

<style>

</style>
