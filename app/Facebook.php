<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    protected $guarded=[];
    public function domaine(){
        return $this->belongsToMany(Domaine::class,'facebook_domaine');//->withPivot('type_id','type_nom','id');
    }
}
