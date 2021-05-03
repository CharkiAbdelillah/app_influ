<?php

namespace App\Http\Controllers;

use App\Type_activite;
use Illuminate\Http\Request;
use App\Personne;
use App\ActiviteDomaine;

class TypeActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $personne=Personne::orderBy('created_at', 'desc')->first();
            $personne->type_activites()->create([
                'nom'=>$request->nomType,
            ]);
            $ativiteDom=[];
            $type=Type_activite::orderBy('created_at', 'desc')->first();//bax njibo akhi id dyl activite
            $domaines=$request->domaineTab;
            foreach($domaines as $k){ 
                \Log::info($k);// hna nmxi ldik fichier laravel.log likayn f storage onxof taghyir    
                // \Log::info($domaines);// hna nmxi ldik fichier laravel.log likayn f storage onxof taghyir    
                array_push($ativiteDom,['type_activite_id'=> $type->id,'domaine_id'=>$k]);
                // ActiviteDomaine::create({
                //             'type_activite_id'=> $type->id,'domaine_id'=>$k
                //         });
                
            }
            ActiviteDomaine::insert($ativiteDom);
        
        return response()->json(['message'=>'Ajout bien fait 2']);
        
        //methode 2
            // $type=Type_activite::orderBy('created_at', 'desc')->first();//bax njibo akhi id dyl activite
            // foreach($domaines as $c){
            //     ActiviteDomaine::create({
            //         'type_activite_id'=> $c,
            //         'domaine_id'=>$type->id,
            //     });
            // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type_activite  $type_activite
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {       
        $per=Personne::find($id);
        \Log::info('type :'.$per->type_activites);
        return response()->json($per->type_activites);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type_activite  $type_activite
     * @return \Illuminate\Http\Response
     */
    public function edit(Type_activite $type_activite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type_activite  $type_activite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type_activite $type_activite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type_activite  $type_activite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_activite $type_activite)
    {
        //
    }
}
