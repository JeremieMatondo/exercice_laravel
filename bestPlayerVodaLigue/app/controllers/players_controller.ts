import { HttpContext } from '@adonisjs/core/http'

import Player from "#models/player"

export default class PlayersController {
    async index({}: HttpContext) {
        const players = await Player.all()
        return players
      }

      async show({ params }: HttpContext) {
        const player = await Player.findOrFail(params.id)
        return player
      }

      async store({ request }: HttpContext) {
        const data = request.all()
        const player= await Player.create(data)
        return player
      }
}
