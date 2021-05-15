<?php

namespace App;
use App\Instagrame;
use App\Facebook;
use App\Snapchat;
use App\Youtube;
use App\Personne_info;
use App\Historique;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $guarded=[];
    // protected $fillable = [
    //     'nom', 'email','is_admin', 'password','created_at','update_at'
    // ];
        public function historique(){
            return $this->belongsToMany(Historique::class,'historique_personne');
        }
        public function getpersonne_info(){
            return $this->hasOne(Personne_info::class);
        }
        public function instagram(){
            return $this->hasOne(Instagrame::class);
        }
        public function facebook(){
            return $this->hasOne(Facebook::class);
        }
        public function youtube(){
            return $this->hasOne(Youtube::class);
        }
        public function snapchat(){
            return $this->hasOne(Snapchat::class);
        }
    }
