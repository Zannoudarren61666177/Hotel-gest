<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'reservation_services')
            ->withPivot('quantite', 'prix_total');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}