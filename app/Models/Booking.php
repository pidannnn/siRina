<?php

namespace App\Models;
use App\Models\User; // <-- INI TEMPATNYA

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'start_date',
        'end_date',
        'status'
    ];

    // Relasi ke user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke ruangan
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}