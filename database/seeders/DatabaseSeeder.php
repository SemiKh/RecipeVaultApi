<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\RecipeFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::factory(10)->create();
//        Recipe::factory(100)->create();

        $this->call([
            RoleSeeder::class,
            RecipeSeeder::class,
            FavoriteSeeder::class,
            ]);
    }
}
