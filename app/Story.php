<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Instagrame;
class Story extends Model
{

    protected $guarded=[];
    public function instagrame_story(){
        return $this->belongsTo(Instagrame::class);
    }
}
