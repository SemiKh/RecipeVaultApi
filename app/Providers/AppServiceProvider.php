<?php

namespace App\Providers;

use App\Models\Recipe;
use App\Notifications\RecipeNotif;
use App\Policies\RecipePolicy;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    protected array $policies = [
        Recipe::class => RecipePolicy::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        Recipe::created(function($recipe) {
            $recipe->author->notify(new RecipeNotif($recipe));
        });
    }


}
