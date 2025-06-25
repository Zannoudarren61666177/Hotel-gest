<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipement extends Model
{
    use HasFactory;

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_equipements');
    }
}