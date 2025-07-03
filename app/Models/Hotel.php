<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    // Permet l'assignation en masse de ces champs
    protected $fillable = [
        'nom',
        'adresse',
        'email',
        'telephone',
        'description',
        'type_chambre',
        'image_url',
        'statut',
    ];

    // Relations
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}