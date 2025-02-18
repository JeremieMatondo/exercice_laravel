import Player from '#models/player'
import Vote from '#models/vote'
import type { HttpContext } from '@adonisjs/core/http'

export default class VotesController {
    public async vote({ request, response }: HttpContext) {
        const { userId, playerId } = request.only(['userId', 'playerId'])
    
        // Vérifier si l'utilisateur a déjà voté
        const existingVote = await Vote.query().where('user_id', userId).first()
        if (existingVote) {
          return response.status(400).json({ message: 'Vous avez déjà voté !' })
        }
    
        // Enregistrer le vote
        const vote = await Vote.create({ user_id: userId, player_id: playerId })

    
        // Incrémenter le vote du joueur
        const player = await Player.find(playerId)
        if (player) {
          player.votes += 1
          await player.save()
        }
    
        return response.status(201).json({ message: 'Vote enregistré avec succès', vote })
      }
}
