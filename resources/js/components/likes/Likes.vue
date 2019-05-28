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
    methods:{
        likeIt(){
            if(User.loggedIn()){
                !this.liked ? this.like() : this.dislike()
                this.liked = !this.liked
            }else{
                let x=window.confirm("Login to like?")
                if (x)
                    this.$router.push('/login')
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
