<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Extra_chiffre;
use App\Instagrame;
class Extra_type extends Model
{
    protected $guarded=[];
    public function instagrame_extra_tye(){
        return $this->belongsTo(Instagrame::class);
    }

    public function extra_chiffre(){
        return $this->hasOne(Extra_chiffre::class);
    }
}
