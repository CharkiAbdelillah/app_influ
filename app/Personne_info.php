<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Personne;
class Personne_info extends Model
{
    protected $guarded=[];
    // protected $fillable = [
    //     'personne_id','cm'
    // ];
    public function getpersonne(){
        return $this->belongsTo(Personne::class);
    }
}
