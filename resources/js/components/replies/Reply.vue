<template>
  <v-card
    class="mx-auto my-1"
  >
    <v-card-actions>
      <v-list-tile class="grow">
        <v-list-tile-avatar color="grey darken-3">
          <v-img
            class="elevation-6"
            src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
          ></v-img>
        </v-list-tile-avatar>

        <v-list-tile-content>
          <v-list-tile-title>{{data.user}}</v-list-tile-title>
        </v-list-tile-content>
        <v-spacer></v-spacer>
        <div v-if="!editing">
        <div v-if="own">
        <v-btn icon><v-icon @click="edit">edit</v-icon></v-btn>
        <v-btn icon><v-icon @click="dlt">clear</v-icon></v-btn>
        </div></div>
      </v-list-tile>
    </v-card-actions>
    <edit-reply v-if="editing" :data="data"></edit-reply>
    <v-card-text class="subheading" v-html="reply" v-else>
    </v-card-text>
    <v-card-title>
      <span class="font-weight-light">said {{data.created_at}}</span>
      <v-spacer></v-spacer>
      <likes :data="data"></likes>
    </v-card-title>
    
  </v-card>
</template>

<script>
import EditReply from './EditReply.vue'
import Likes from '../likes/Likes.vue'
export default {
  components:{EditReply, Likes},
    props:['data'],
    data(){
      return{
        editing: false
      }
    },
    computed:{
        own(){
            return User.ownId(this.data.user_id)
        },
        reply(){
          return md.parse(this.data.reply)
        }
    },
    created(){
      this.cancelEdit()
    },
    methods:{
        dlt(){
            EventBus.$emit('dltReply',this.data.id)
        },
        edit(){
          this.editing = true
        },
        cancelEdit(){
          EventBus.$on('cnclEdit',() =>{
            this.editing = false
          })
        }
    }
}
</script>

<style>

</style>
