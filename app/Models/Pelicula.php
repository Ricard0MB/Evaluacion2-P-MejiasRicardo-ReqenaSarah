<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pelicula extends Model
{
    protected $fillable = ['titulo', 'duracion', 'estreno', 'director_id'];

    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class);
    }
}