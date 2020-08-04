<?php

namespace App;

use App\Poste;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['name_cat'];

    // hasMany
    public function postes()
    {
        return $this->hasMany('App\Poste');
    }
}
