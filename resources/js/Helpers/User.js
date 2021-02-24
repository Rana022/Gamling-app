import AppStorage from './AppStorage.js'
import Token from './Token.js'

class User{
  responseAfterLogin(response){
      const access_token = response.data.access_token
      const username = response.data.name
      if(Token.isValid(access_token)){
          AppStorage.store(access_token,username)
      }
  }
  hasToken(){
      const storeToken = localStorage.getItem('token')
      if(storeToken){
          return Token.isValid(storeToken) ? true : false
      }
  }

  loggedin(){
      return this.hasToken()
  }

  logout(){
      AppStorage.clear()
  }

  name(){
      if(this.loggedin()){
          return localStorage.getItem('name')
      }
  }

  id(){
      if(this.loggedin()){
          const payload = Token.payload(localStorage.getItem('token'))
          return payload.sub
      }
      return false
  }
}
export default User = new User()