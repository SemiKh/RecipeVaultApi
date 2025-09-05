<?php

namespace App\Rest\Controllers;

use App\Rest\Controllers\Controller;

class RecipeController extends Controller
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<\Lomkit\Rest\Http\Resource>
     */
    public static $resource = \App\Rest\Resources\RecipeResource::class;
}
