<?php

namespace App\Models;

use App\Events\Ingredients\IngredientDeleting;
use App\Models\Concerns\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $name
 * @property float $volume
 * @property int|null $percentage
 * @property int|null $pump_id
 *
 * @property Pump $pump
 */
class Ingredient extends Model
{

    protected $fillable = [
        'name',
        'price',
    ];
}
