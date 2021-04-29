<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type_activite;
use App\Story;
use App\Feed;
class Instagrame extends Model
{
    protected $guarded=[];
    public function type_activite(){
        return $this->belongsTo(Type_activite::class);
    }
    public function feed(){
        return $this->hasOne(Feed::class);
    }
    public function story(){
        return $this->hasOne(Story::class);
    }
}

