<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Trip extends Model
{
    protected $table = 'trip';
    protected $fillable = ['route_id','transport_id','departure_at','arrival_at'];
    protected $casts = ['departure_at'=>'datetime','arrival_at'=>'datetime'];

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class,'route_id');
    }
    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class,'transport_id');
    }
    public function cargo(): HasMany
    {
        return $this->hasMany(Cargo::class,'trip_id');
    }

    public function usersMany(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'cargo', 'trip_id', 'sender_id')
            ->withPivot(['weight_kg'])
            ->withTimestamps();
    }
}


