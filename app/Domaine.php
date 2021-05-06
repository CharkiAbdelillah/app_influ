<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type_activite;
use App\Instagrame;
class Domaine extends Model
{

    protected $guarded=[];
    public function type_activite_domaine(){
        return $this->belongsToMany(Type_activite::class,'activite_domaines');
    }
    public function instagram(){
        return $this->belongsToMany(Instagrame::class,'instagrame_domaine');//->withPivot('type_id','type_nom','id');
    }
}
