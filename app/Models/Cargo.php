<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cargo extends Model
{
    protected $table = 'cargo';
    protected $fillable = ['trip_id','sender_id','weight_kg'];

    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class,'trip_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'sender_id');
    }
}


