import Token from './Token'
import AppStorage from './AppStorage'


class User{
    login(form){
        axios.post('/api/auth/login',form)
        .then(res=> this.loginValidation(res))
        .catch(err=> console.log(err.response.data))
    }
    loginValidation(res){
        const jwt = res.data.access_token
        const user = res.data.user
        if(Token.isValid(jwt)){
            AppStorage.store(jwt,user)
        }
    }
    hasToken(){
        const storedToken = AppStorage.getToken()
        if(storedToken){
            return Token.isValid(storedToken)
        }
        return false
    }
    loggedIn(){
        return this.hasToken()
    }
    logOut(){
        AppStorage.clear()
    }
    name(){
        if(this.loggedIn()){
            return AppStorage.getUser()
        }
    }
    id(){
        if(this.loggedIn()){
            return Token.payload(AppStorage.getToken()).sub
        }
    }
}
export default User = new User();