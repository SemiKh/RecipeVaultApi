<?php
namespace Tests\Feature;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeTest extends TestCase{
    use RefreshDatabase;
    public function testRecipe(){
        $recipe = Recipe::factory()->create();
        $this->assertDatabseCount('recipes', 40);
    }
}
