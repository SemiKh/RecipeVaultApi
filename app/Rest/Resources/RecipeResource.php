<?php

namespace App\Rest\Resources;

use App\Rest\Resources\Resource;
use Lomkit\Rest\Http\Requests\RestRequest;
use Lomkit\Rest\Relations\BelongsTo;
use Lomkit\Rest\Relations\BelongsToMany;

class RecipeResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    public static $model = \App\Models\Recipe::class;

    /**
     * The exposed fields that could be provided
     * @param RestRequest $request
     * @return array
     */
    public function fields(\Lomkit\Rest\Http\Requests\RestRequest $request): array
    {
        return [
            'id',
            'title',
            'description',
            'image',
            'user_id',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * The exposed relations that could be provided
     * @param RestRequest $request
     * @return array
     */
    public function relations(\Lomkit\Rest\Http\Requests\RestRequest $request): array
    {
        return [
            BelongsTo::make('author', AuthUserResource::class),
            BelongsToMany::make('favoriteBy', FavoriteResource::class),
        ];
    }

    /**
     * The exposed scopes that could be provided
     * @param RestRequest $request
     * @return array
     */
    public function scopes(\Lomkit\Rest\Http\Requests\RestRequest $request): array
    {
        return [];
    }

    /**
     * The exposed limits that could be provided
     * @param RestRequest $request
     * @return array
     */
    public function limits(\Lomkit\Rest\Http\Requests\RestRequest $request): array
    {
        return [
            10,
            25,
            50
        ];
    }

    /**
     * The actions that should be linked
     * @param RestRequest $request
     * @return array
     */
    public function actions(\Lomkit\Rest\Http\Requests\RestRequest $request): array {
        return [];
    }

    /**
     * The instructions that should be linked
     * @param RestRequest $request
     * @return array
     */
    public function instructions(\Lomkit\Rest\Http\Requests\RestRequest $request): array {
        return [];
    }

    public function rules(\Lomkit\Rest\Http\Requests\RestRequest $request): array{
        return [
            'title' => ['string', 'required', 'max:255'],
            'description' => ['required', 'max:2048'],
            'image' => [''],
        ];
    }

    public function updateRules(RestRequest $request): array
    {
        return [
            'title' => ['string', 'required', 'max:255'],
            'description' => ['required', 'max:2048'],
            'image' => [''],
        ];
    }

    public function scoutFields(RestRequest $request): array
    {
        return [
            'title',
            'description',
        ];
    }
}
