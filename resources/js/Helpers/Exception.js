import User from './User'
class Exception{
    handle(err){
        this.isExpired(err.response.data.error) 
    }
    isExpired(err){
        if(err == 'Token is Expired'){
            User.logOut()
        }
        else if(err == 'Token is Invalid'){
            User.logOut()
        }
    }
}
export default Exception = new Exception();