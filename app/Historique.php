<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    public function domaine_his(){
        return $this->belongsToMany(Domaine::class,'domaine__histo__domaines');
    }
}
