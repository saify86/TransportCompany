<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transport extends Model
{
    protected $table = 'transport';
    protected $fillable = ['name', 'capacity_kg'];

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class, 'transport_id');
    }

    public function routesMany(): BelongsToMany {
        return $this->belongsToMany(Route::class, 'trip', 'transport_id', 'route_id')
            ->withPivot(['departure_at', 'arrival_at'])
            ->withTimestamps();
    }
}


