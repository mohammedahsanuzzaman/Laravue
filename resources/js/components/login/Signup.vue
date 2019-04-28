<template>
<v-container>
  <form class="elevation-2"@submit.prevent="signup">
    <h1>Sign Up</h1>
    <div>
    <v-text-field
      v-model="form.name"
      label="Name"
      spellcheck="false"
      required
    ></v-text-field>
    <v-text-field
      v-model="form.email"
      label="E-mail"
      spellcheck="false"
      :rules="emailRules"
      required
    ></v-text-field>
    <v-text-field
      v-model="form.password"
      label="Password"
      :rules="passRules"
      required
      type="password"
    ></v-text-field>
    <v-text-field
      v-model="form.password_confirmation"
      label="Confirm Password"
      :rules="passRules"
      required
      type="password"
    ></v-text-field>

    <v-btn color="#3490dc" type="submit" round>Sign Up</v-btn>
    <router-link to="/login"><v-btn outline color="#3490dc" round>Log In</v-btn></router-link>
    <v-btn @click="clear" color="error" outline round>clear</v-btn>
    </div>
  </form>
</v-container>
</template>

<script>
  import axios from 'axios'
  export default {

    data: () => ({
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      } ,
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(v) || 'E-mail must be valid'
      ],
      passRules: [
        v => !!v || 'Password is required',
        // v => /^(?=.*[a-z])(?=.*[0-9])(?=.{8,})/.test(v) || 'Please enter a valid Password'
      ]

    }),

    created() {
      if(User.loggedIn()){
        this.$router.push({name: 'forum'})
      }
    },

    methods: {
      signup: function() {
        axios.post('/api/auth/signup',this.form)
        .then(res =>{ 
          User.loginValidation(res)
        } )
        .catch(err => console.log(err.response.data))
        
      },
      clear () {
        this.form.name = null
        this.form.password = null
        this.form.email = null
        this.form.password_confirmation = null
      }
    }
  }
</script>

<style scoped>
.container{
  height: 80vh ;
  width: 100vw;
  display: flex;
  justify-content: center;
  align-items: center;
}
form{
  width: 100%;
  max-width: 650px;
  background-color: #f5f5f5;
  padding: 25px;
}
form h1{
  color: #3490dc;
}
</style>
