import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
  protected tableName = 'players'

  async up() {
    this.schema.createTable(this.tableName, (table) => {
      table.increments('id')
      table.string('name').notNullable()
      table.integer('votes').defaultTo(0)
      table.string('image').notNullable
      table.string('pays').notNullable()
      table.integer('numero').notNullable()
      table.integer('nbre matchs').notNullable()
      table.integer('but').nullable()
      table.string('passe decisive').nullable()
      table.timestamp('created_at')
      table.timestamp('updated_at').nullable()
    })
  }

  async down() {
    this.schema.dropTable(this.tableName)
  }
}