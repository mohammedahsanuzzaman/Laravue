import User from './User'
class Exception{
    handle(err){
        this.isExpired(err.response.data.error) 
    }
    isExpired(err){
        if(err == 'Token is Invalid' || 'Token is Expired'){
            User.logOut()
        }

    }
}
export default Exception = new Exception();