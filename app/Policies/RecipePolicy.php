<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;

class RecipePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {

    }

    public function view(User $user, Recipe $recipe): bool
    {
        return $user->can('view_recipes');
    }

    public function viewAny(User $user): bool
    {
        return $user->can('view_recipes');
    }

    public function create(User $user):bool{
        return $user->can('create_recipes');
    }

    public function update(User $user, Recipe $recipe): bool
    {
        return $user->can('update_recipes');
    }

    public function delete(User $user, Recipe $recipe): bool
    {
        return $user->can('delete_recipes');
    }
}
