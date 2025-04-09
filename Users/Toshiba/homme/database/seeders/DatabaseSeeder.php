<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Option;
use App\Models\posts;
use App\Models\Property;
use App\Models\User;
use Database\Factories\PropertyFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory(10)->create();
       Property::factory(50)->create();
      $options = Option::factory(10)->create();
      posts::factory(20)->create();
       
    }
}
