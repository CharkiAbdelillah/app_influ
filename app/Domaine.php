<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type_activite;
use App\Domaine_historique;
class Domaine extends Model
{

    protected $guarded=[];
    public function type_activite_domaine(){
        return $this->belongsToMany(Type_activite::class);
    }
    public function domaine_historique(){
        return $this->belongsToMany(Domaine_historique::class);
    }
}
