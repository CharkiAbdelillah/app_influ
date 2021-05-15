<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snapchat extends Model
{
    protected $guarded=[];
    public function domaine(){
        return $this->belongsToMany(Domaine::class,'snapchat_domaine');//->withPivot('type_id','type_nom','id');
    }
}
