<template>
  <v-card class="h8">
    <div class="links">
      <a href="https://www.linkedin.com/in/ahsan-web/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
      <a href="https://github.com/ahsan-zaman" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
      <a href="https://wa.me/966571708606?text=hello,%20I%20would%20like%20to%20contact%20you." target="_blank">
        <i class="fa fa-whatsapp" aria-hidden="true"></i>
      </a>
    </div>
    <div class="txt text-xs-center">
      <p> Copyright &copy;{{new Date().getFullYear()}} All rights reserved <br> This site is made with &nbsp;
      &#x2764; &nbsp; by &nbsp; <a href="https://ahsan-web.ml" target="_blank" >Ahsan</a></p>
    </div>
  </v-card>
</template>

<script>
export default {

}
</script>

<style scoped>
.h8{
  min-height: 150px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center
}
.h8 div{
  height: 75px;
}
.links{
  font-size: 150%;
  padding-top: 15px
}
.links a{
  padding: 15px 20px
}
</style>
