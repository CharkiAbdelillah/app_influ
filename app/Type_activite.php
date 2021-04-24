<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Personne;
use App\Instagrame;
use App\Domaine;
class Type_activite extends Model
{
    protected $guarded=[];
    public function personne(){
        return $this->belongsTo(Personne::class);
    }
    public function instagrame(){
        return $this->hasOne(Instagrame::class);
    }
    public function domaine(){
        return $this->belongsToMany(Domaine::class);
    }
}
