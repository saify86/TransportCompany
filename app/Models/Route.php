<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Route extends Model
{
    protected $table = 'route';
    protected $fillable = ['name', 'tariff_per_kg', 'distance_km'];

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class, 'route_id');
    }

    public function transportsMany(): BelongsToMany {
        return $this->belongsToMany(Transport::class, 'trip', 'route_id', 'transport_id')
            ->withPivot(['departure_at', 'arrival_at'])
            ->withTimestamps();
    }
}


