import Token from './Token'
import AppStorage from './AppStorage'

class User{
    login(data){ 
        axios.post('/api/auth/login',data)
        .then(res => this.responseAfterLogin(res))
        .catch(error => console.log(error))        
    }

    responseAfterLogin(res){
        const access_token = res.data.access_token
        const username = res.data.user

        if(Token.isValid(access_token)){ 
            AppStorage.store(username,access_token)
            window.location = '/user/profile'
        }

    }

    hasToken(){
        const storeToken = AppStorage.getToken()
        if(storeToken){
            return Token.isValid(storeToken) ? true :false
        }
        return false
    }

    loggedIn(){
        return this.hasToken()
    }
    logout(){
        AppStorage.clear()
        window.location = '/user/profile'
    }
    name(){
        if(this.loggedIn()){
            return AppStorage.getUser()
        }
    }
    id(){
        if(this.loggedIn()){
            const payload = Token.payload(AppStorage.getToken())
            return payload.sub
        }
    }
    own(id){
        return this.id() == id
    }
}

export default User = new User();