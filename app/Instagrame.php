<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type_activite;
use App\Extra_type;

class Instagrame extends Model
{
    protected $guarded=[];
    public function type_activite(){
        return $this->belongsTo(Type_activite::class);
    }
    public function extra_type(){
        return $this->hasOne(Extra_type::class);
    }
}
