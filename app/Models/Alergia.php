<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    use HasFactory;

    public function usuarios()
    {
        return $this->belongsToMany(User::class, "alergiasUsuarios", "idAlergia", "idUsuario")->withTimestamps();
    }

}
