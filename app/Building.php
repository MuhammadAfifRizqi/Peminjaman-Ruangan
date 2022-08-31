<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->hasMany(Room::class, 'id_building');
    }
}
