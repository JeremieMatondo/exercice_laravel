/*
|--------------------------------------------------------------------------
| Routes file
|--------------------------------------------------------------------------
|
| The routes file is used for defining the HTTP routes.
|
*/

import UsersController from '#controllers/users_controller'
import router from '@adonisjs/core/services/router'
import { middleware } from './kernel.js'
import PlayersController from '#controllers/players_controller'
import VotesController from '#controllers/votes_controller'

router.get('/', async () => {
  return {
    hello: 'world',
  }
})
router.post('vote',[VotesController,'vote']).use(middleware.auth({guards:['api']}))
router.resource('users',UsersController)
router.post('login',[UsersController,'login'])
router.group(()=>{
  router.resource('players',PlayersController).apiOnly()
}).use(middleware.auth({guards:['api']}))
router.post('user',async({auth})=>{
  return auth.user
}).use(middleware.auth({guards:['api']}))
