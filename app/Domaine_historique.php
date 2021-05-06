<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Domaine;
class Domaine_historique extends Model
{
    
    protected $guarded=[];
    public function domaine_his(){
        return $this->belongsToMany(Domaine::class,'domaine__histo__domaines');
    }
    public function typeIdd(){
        return $this->belongsToMany(Domaine_Histo_Domaine::class);
    }
}
