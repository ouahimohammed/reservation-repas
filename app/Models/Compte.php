<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Compte extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'matricule';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'matricule',
        'login',
        'motdepasse',
        'nom',
        'prenom',
        'email',
        'photo',
        'type_compte',

    ];

    protected $hidden = [
        'motdepasse',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->motdepasse; // Assurez-vous que c'est bien le nom de votre colonne
    }
    public function setMotdepasseAttribute($value)
    {
        // $this->attributes['password'] = bcrypt($value);
        $this->attributes['motdepasse'] = bcrypt($value);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'matricule', 'matricule');
    }
}