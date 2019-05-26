<template>
  <div class="text-xs-center">
    <v-menu offset-y>
      <template v-slot:activator="{ on }">
        <v-btn icon v-on="on">
          <v-icon color="red" v-if="unread_count > 0">notifications</v-icon>
          <v-icon v-else>notifications</v-icon>
          <span style="color: #FF5252" v-if="unread_count > 0">{{unread_count}}</span>
        </v-btn>
      </template>
      <v-list>
        <v-list-tile v-if="unread_count <= 0 " >
          <v-list-tile-title>No New Replies!</v-list-tile-title>
        </v-list-tile>
        <v-list-tile v-else v-for="(item, index) in unread" :key="index">
            <router-link :to="item.path">
                <v-list-tile-title @click="readIt(item.id)">{{ item.replyBy }} replied to your question ({{item.question}})</v-list-tile-title>
            </router-link>
        </v-list-tile>
        <v-divider></v-divider>
        <v-list-tile v-for="item in read" :key="item.id">
          <v-list-tile-title>{{ item.replyBy.toUpperCase() }} replied ... <span class="caption grey--text"> {{item.replied_at}} </span></v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>
  </div>
</template>

<script>
  export default {
    data: () => ({
      read : {},
      unread : {},
      unread_count : null
    }),
    created(){
        if(User.loggedIn()){
            this.getNotifications()
        }
    },
    methods:{
        getNotifications(){
            axios.post('/api/notify')
            .then(res => {
                this.read = res.data.read
                this.unread = res.data.unread
                this.unread_count = res.data.unread.length
            })
            .catch(err => {
              Exception.handle(err)
            })
        },
        readIt(id){
            axios.post('/api/markAsRead',{id:id})
            .then(res =>{
                this.getNotifications()
            })
        }
    }
  }
</script>

<style>

</style>
