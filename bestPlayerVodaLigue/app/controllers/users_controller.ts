 import User from '#models/user'
import type { HttpContext } from '@adonisjs/core/http'

export default class UsersController {
    async store({ request }: HttpContext) {
        return User.create(request.all())
      }
      async show({ params }: HttpContext) {
        return await User.findOrFail(params.id)
      }
      
      async login({ request }: HttpContext){
        const email=request.input('email')
        const password=request.input('password')
        const userAuth= await User.verifyCredentials(email,password)
        const tokenGenerate=await User.accessTokens.create(userAuth)
        return{
          User:userAuth,
          token:tokenGenerate
        }
      }
}