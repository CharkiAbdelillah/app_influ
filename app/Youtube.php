<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    protected $guarded=[];
    public function domaine(){
        return $this->belongsToMany(Domaine::class,'youtube_domaine');//->withPivot('type_id','type_nom','id');
    }
}
