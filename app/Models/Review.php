<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'name',
        'email',
        'description',
        'rating',
    ];

    /**
     * Relación: Una reseña pertenece a una propiedad.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
