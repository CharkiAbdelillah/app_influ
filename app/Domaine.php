<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type_activite;
use App\Instagrame;
use App\Snapchat;
use App\Facebook;
use App\Youtube;
class Domaine extends Model
{

    protected $guarded=[];
    public function type_activite_domaine(){
        return $this->belongsToMany(Type_activite::class,'activite_domaines');
    }
    public function instagram(){
        return $this->belongsToMany(Instagrame::class,'instagrame_domaine');//->withPivot('type_id','type_nom','id');
    }
    public function youtube(){
        return $this->belongsToMany(Youtube::class,'youtube_domaine');//->withPivot('type_id','type_nom','id');
    }
    public function facebook(){
        return $this->belongsToMany(Facebook::class,'facebook_domaine');//->withPivot('type_id','type_nom','id');
    }
    public function snapchat(){
        return $this->belongsToMany(Snapchat::class,'snapchat_domaine');//->withPivot('type_id','type_nom','id');
    }

}
