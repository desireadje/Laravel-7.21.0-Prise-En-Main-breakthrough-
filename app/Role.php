<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Mise de la relation en place
     *
     * Un utilisateur peut avoir plusieurs roles
     * Un role peut etre attribué à plusieur users
     *
     * Donc on utilise la clossure "belongsToMany"
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
