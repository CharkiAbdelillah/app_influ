<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Personne;
use App\Instagrame;
use App\Domaine;
class Type_activite extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    protected $guarded=[];
    public function personne(){
        return $this->belongsTo(Personne::class);
    }
    public function instagrame(){
        return $this->hasOne(Instagrame::class);
    }
    public function domaine(){
        return $this->belongsToMany(Domaine::class,'activite_domaines')->withPivot('id');
    }
    // public function domaine(){
    //         return $this->hasManyDeep(Domaine::class,
    //         [Domaine_historique::class]
    // );
    // return $this->hasManyDeep(Domaine::class, ['App\User', Domaine_historique::class]);
    //     }
}
