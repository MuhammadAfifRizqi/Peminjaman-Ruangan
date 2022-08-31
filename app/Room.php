<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function building(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Building::class, 'id_building', 'id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'id_room');
    }

    public function medias()
    {
        return $this->hasMany(Gallery::class, 'id_room');
    }
}
