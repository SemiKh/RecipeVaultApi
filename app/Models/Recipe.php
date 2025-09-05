<?php

namespace App\Models;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use HasFactory, Encryptable, Searchable;

    protected $fillable = [
        'title',
        'image',
        'user_id',
        'description',
    ];

    protected array $encrypt = ['description'];

    public function toSearchableArray(): array {
        return array_merge($this->toArray(),[
            'id'=> $this->id,
            'title'=> $this->title,
        ]);
    }

    public function favoriteBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'recipe_id');
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
