<template>
        <v-card>
        <v-card-title primary-title>
          <div>
            <div class="headline">{{data.title}}</div>
            <span class="grey--text">{{data.user}} - {{data.created_at}}</span>
          </div>
        </v-card-title>

        <v-card-text  class=" font-weight-bold">
          <div class="cont" v-html="body"></div>
        </v-card-text>
        <v-card-actions v-if="own">
          <v-spacer></v-spacer>
          <v-btn outline round icon class="mr-2" color="#3490dc" @click="edit">
            <v-icon >edit</v-icon>
          </v-btn>
          <v-btn icon outline color="error" @click="dlt">
            <v-icon>delete</v-icon>
          </v-btn>
        </v-card-actions>
      </v-card>
</template>

<script>
import md from 'marked'
export default {
    props:['data'],
    data(){
      return{
        own: User.ownId(this.data.user_id)
      }
    },
    computed:{
      body(){
        return md.parse(this.data.body)
      }
    },
    methods:{
      dlt(){
        axios.delete(`/api/question/${this.data.slug}`)
        .then(res=> this.$router.push('/forum'))
        .catch(err=> console.log(err.response.data))
      },
      edit(){
        EventBus.$emit('edit')
      }
    }
}
</script>

<style scoped>
.cont{
  font-size: 18px !important;
  overflow: hidden !important;
}
.cont p img{
  width: 100%;
  
}
</style>

