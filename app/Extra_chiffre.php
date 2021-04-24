<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Extra_type;
class Extra_chiffre extends Model
{
    protected $guarded=[];
    public function extra_type(){
        return $this->hasOne(Extra_type::class);
    }
}
