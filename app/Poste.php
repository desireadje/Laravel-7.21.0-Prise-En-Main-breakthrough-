<?php

namespace App;

use App\Categorie;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    // je fais la relation entre les postes et les categories [belongsTo]
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
}
