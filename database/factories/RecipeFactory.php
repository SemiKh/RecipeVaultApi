<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($this->faker));
        $this->faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($this->faker));
        return [
            'title'=> $this->faker->foodName(),
            'description'=>$this->faker->text(2048),
            'image'=>$this->faker->imageUrl($width = 640, $height = 480,['dish']),
            'user_id' => User::factory(),
        ];
    }
}
