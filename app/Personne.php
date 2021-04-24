<?php

namespace App;
use App\Type_activite;
use App\Personne_info;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $guarded=[];
    // protected $fillable = [
    //     'nom', 'email','is_admin', 'password','created_at','update_at'
    // ];
 
    public function type_activites(){
        return $this->hasMany(Type_activite::class);
    }
    public function getpersonne_info(){
        return $this->hasOne(Personne_info::class);
    }
    
}
