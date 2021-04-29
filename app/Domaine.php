<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type_activite;
use App\Domaine_historique;
class Domaine extends Model
{

    protected $guarded=[];
    public function type_activite_domaine(){
        return $this->belongsToMany(Type_activite::class,'activite_domaines');
    }
    public function domaine_historique(){
        return $this->belongsToMany(Domaine_historique::class,'domaine__histo__domaines')->withPivot('type_id','type_nom','id');;
    }
}
