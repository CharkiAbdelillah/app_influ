<?php

namespace App;
use App\Type_activite;
use App\Personne_info;
use App\Domaine;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $guarded=[];
    // protected $fillable = [
    //     'nom', 'email','is_admin', 'password','created_at','update_at'
    // ];
    public function type_activites(){
        return $this->belongsToMany(Type_activite::class,'type_activite_personne');
    }
    // public function dommaine(){
    //     return $this->belongsToMany(Domaine::class,'activite_domaines');
    // }
    public function getpersonne_info(){
        return $this->hasOne(Personne_info::class);
    }
    
}
