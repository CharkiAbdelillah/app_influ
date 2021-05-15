<?php

namespace App;
use \App\Personne;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    public function personne(){
        return $this->belongsToMany(Personne::class,'historique_personne');
    }
    
}
