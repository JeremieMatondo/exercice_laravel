import { DateTime } from 'luxon'
import { BaseModel, column } from '@adonisjs/lucid/orm'

export default class Player extends BaseModel {
  @column({ isPrimary: true })
  declare id: number
  @column()
  declare name: string
  @column()
  declare votes: string
  @column()
  declare image: string
  @column()
  declare pays: string
  @column()
  declare numero: string
  @column({ columnName: 'nbre matchs' })
  declare nbrmatchs: number
  @column()
  declare but: number
  @column({columnName :'passe decisive'})
  declare passesDecisives: number

  @column.dateTime({ autoCreate: true })
  declare createdAt: DateTime

  @column.dateTime({ autoCreate: true, autoUpdate: true })
  declare updatedAt: DateTime
}