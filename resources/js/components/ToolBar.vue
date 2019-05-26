<template>
    <div>
      <v-navigation-drawer
      fixed
      v-model="drawer"
      right
      app>
      <v-list dense>
        <v-list-tile @click="drawer = false" v-for="item in items" :key="item.title" :to="item.to" v-if="item.show">
          <v-list-tile-action>
            <v-icon>{{item.icon}}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{item.title.toUpperCase()}}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
        <v-toolbar app>
        <router-link to="/"><v-toolbar-title>LaraVue</v-toolbar-title></router-link>
        <v-spacer></v-spacer>
        <reply-notification v-if="loggedIn"></reply-notification>
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
    </v-toolbar>
    
    </div>
</template>

<script>
import ReplyNotificaton from './ReplyNotification.vue'
export default {
    components:{'reply-notification':ReplyNotificaton},
    data(){
        return{
            drawer : false,
            loggedIn: User.loggedIn(),
            items: [
                {title: 'home', to: '/', show: true, icon : 'home'},
                {title: 'forum', to: '/forum', show: true, icon : 'forum'},
                {title: 'ask question', to: '/ask-question', show: User.loggedIn(), icon : 'help_outline'},
                {title: 'categories', to: '/categories', show: User.Admin(), icon : 'category'},
                {title: 'login', to: '/login', show: !User.loggedIn(), icon : 'account_circle'},
                {title: 'logout', to: '/logout', show: User.loggedIn(), icon : 'power_settings_new'},
                {title: 'signup', to: '/signup', show: !User.loggedIn(), icon : 'account_box'}
            ]
        }
    },
    created(){
        EventBus.$on('logout',()=>{
            User.logOut()
        })
    }

}
</script>

<style scoped>
a{
    text-decoration: none;
    
}

</style>
