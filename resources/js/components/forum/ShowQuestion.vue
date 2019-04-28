<template>
    <v-container>
        <v-card>
        <v-card-title primary-title>
          <div>
            <div class="headline">{{data.title}}</div>
            <span class="grey--text">{{data.user}} - {{data.created_at}}</span>
          </div>
        </v-card-title>

        <v-card-text v-html="body">
        </v-card-text>
      </v-card>
    </v-container>
</template>

<script>
import md from 'marked'
export default {
    props:['data'],
    computed:{
      body(){
        return md.parse(this.data.body)
      }
    }
}
</script>

<style>

</style>
