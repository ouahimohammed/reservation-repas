<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_reservation',
        'repas1',
        'repas2',
        'repas3',
        'annulation',
        'matricule',
    ];

    protected $casts = [
        'date_reservation' => 'date',
        'repas1' => 'boolean',
        'repas2' => 'boolean',
        'repas3' => 'boolean',
        'annulation' => 'boolean',
    ];

    public function compte()
    {
        return $this->belongsTo(Compte::class, 'matricule', 'matricule');
    }
}