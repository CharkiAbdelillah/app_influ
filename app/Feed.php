<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Instagrame;
class Feed extends Model
{
    protected $guarded=[];
    public function instagrame_feed(){
        return $this->belongsTo(Instagrame::class);
    }
}
