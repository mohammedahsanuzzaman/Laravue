<template>
    <div>
        <v-btn icon @click="likeIt">
            <v-icon color="red" v-if="liked">favorite</v-icon>
            <v-icon v-else>favorite</v-icon><span style="color:red">{{count}}</span>
        </v-btn>
    </div>
</template>

<script>
export default {
    props:['data'],
    data(){
        return{
            liked: this.data.liked,
            count: this.data.like_count
        }
    },
    created(){
        Echo.channel('LikeChannel')
            .listen('LikeEvent', (e) => {
                if(this.data.id == e.id){
                    e.type == 1 ? this.count++ : this.count--
                }
        });
    },
    methods:{
        likeIt(){
            if(User.loggedIn()){
                !this.liked ? this.like() : this.dislike()
                this.liked = !this.liked
            }
        },
        like(){
            axios.post(`/api/${this.data.id}/like`)
            .then(res=> this.count ++)
            
        },
        dislike(){
            axios.delete(`/api/${this.data.id}/like`)
            .then(res=> this.count --)
        }
    }
}
</script>

<style>

</style>
