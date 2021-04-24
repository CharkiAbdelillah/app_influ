<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Domaine;
class Domaine_historique extends Model
{

    protected $guarded=[];
    public function domaine_his(){
        return $this->belongsToMany(Domaine::class);
    }
}
