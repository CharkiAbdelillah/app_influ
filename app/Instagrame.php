<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Domaine;
use App\Story;
use App\Feed;
class Instagrame extends Model
{
    protected $guarded=[];
    public function domaine(){
        return $this->belongsToMany(Domaine::class,'instagrame_domaine');//->withPivot('type_id','type_nom','id');
    }
    public function checkedactivite($id){
        return $this->domaine()->wherePivot('domaine_id',$id)->exists();
    }
    public function feed(){
        return $this->hasOne(Feed::class);
    }
    public function story(){
        return $this->hasOne(Story::class);
    }
}

