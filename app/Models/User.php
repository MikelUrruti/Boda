<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $attributes = [
        'transporte' => "No",
        'confirmado' => "No",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    public function alergias()
    {
        return $this->belongsToMany(User::class, "alergiasusuarios", "idUsuario", "idAlergia")->withTimestamps();
    }

    public function parejaInvitado()
    {
        return $this->hasOne(User::class, 'id', 'pareja');
    }

    public function parejaInvitadoHijo()
    {
        return $this->belongsTo(User::class, 'id', 'pareja');
    }

}
