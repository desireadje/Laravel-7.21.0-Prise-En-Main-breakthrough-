<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Les attributs qui doivent être convertis en types natifs.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mise de la relation en place
     *
     * Un utilisateur peut avoir plusieurs roles
     * Un role peut etre attribué à plusieur users
     *
     * Donc on utilise la clossure "belongsToMany"
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Cette fonction permet de verifier si l'utilisateur
     * connecté a le role Admin.
     *
     * Le resultat de la fonction est retourné dans le Gate edit-users
     * dans la class AuthServiceProvider
     *
     * @return  true or false
     *
     */
    public function isAdmin()
    {
        return  $this->roles()->where('name', 'admin')->first();
    }
}
