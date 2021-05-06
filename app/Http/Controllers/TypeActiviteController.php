<?php

namespace App\Http\Controllers;

use App\Type_activite;
use Illuminate\Http\Request;
use App\Personne;
use App\ActiviteDomaine;
use App\Domaine;
use Illuminate\Support\Facades\DB;

class TypeActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type=Type_activite::all();
        return response()->json($type);
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
            $personne->type_activites()->syncWithoutDetaching($request->nomType);
            // return $personne->
            // return $personne;
            // dd($request->nomType);
            $Type=Type_activite::find($request->nomType);
            $Type->domaine()->detach($request->domaineTab);
            $Type->domaine()->attach($request->domaineTab,['personne_id'=>$personne->id]);
            // $Type=Type_activite::find($request->nomType);
            // $personne->type_activites()->syncWithoutDetaching($request->domaineTab3);
        //     $personne->type_activites()->create([
        //         'nom'=>$request->nomType,
        //     ]);
        //     $ativiteDom=[];
        //     $type=Type_activite::orderBy('created_at', 'desc')->first();//bax njibo akhi id dyl activite
        //     $domaines=$request->domaineTab;
        //     // dd($request->domaineTab);
        //     foreach($domaines as $k){ 
        //         \Log::info($k);// hna nmxi ldik fichier laravel.log likayn f storage onxof taghyir    
        //         // \Log::info($domaines);// hna nmxi ldik fichier laravel.log likayn f storage onxof taghyir    
        //         array_push($ativiteDom,['type_activite_id'=> $type->id,'domaine_id'=>$k]);
        //         // ActiviteDomaine::create({
        //         //             'type_activite_id'=> $type->id,'domaine_id'=>$k
        //         //         });
                
        //     }
        //     ActiviteDomaine::insert($ativiteDom);
        
        // return response()->json(['message'=>'Ajout bien fait 2']);
        
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
        // $per=Personne::find($id);
        $dom=Type_activite::where('personne_id',$id)->get();
            foreach ($dom as $d){
                $typeid=$d->id;
                $typenom=$d->nom;
                // \Log::info('type id '.$typeid);  
                \Log::info('type nom '.$typenom);
                    foreach($d->domaine as $his){
                        \Log::info('dom '.$his->nom);
                        // $dom=$his->nom;
                        $domId=$his->id;
                        // \Log::info('dom id :'.$domId);
                        foreach($his->domaine_historique as $his2){
                                if($his2->pivot->type_id==$typeid && $typenom==$his2->pivot->type_nom && $domId==$his2->pivot->domaine_id){
                                    \Log::info('his '.$his2->nom); //&& $typenom==$kk->type_id
                                    // \Log::info('his total : '.$his2->pivot->id); //&& $typenom==$kk->type_id
                                }   
                        }   
                   }   
            }
        return response()->json($dom);
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

    public function getTypeDomaine(){
        return $type=Type_activite::with('domaine')->get();
        // return $type->domaine;
    }
    public function getDomaineType(){
        // $type=Domaine::find(1);
        return $type=Domaine::with('domaine_historique')->get();
        // return $type->domaine_historique;
    }
    public function upadteType(Request $request, Type_activite $type_activite)
    {
            $idType=Type_activite::where([
                ['nom', '=', $request->nomType],
                ['personne_id', '=', $request->id]])->get();
                \Log::info('get id type  :'.$idType[0]['id']);
                $iddType=$idType[0]['id'];
                // dd($iddType);
                // dd($request->id);
            $domaines=$request->domaineTab;
            // dd($request->domaineTab);
            $Type=Type_activite::find($iddType);
            // $Type->domaine()->sync($request->domaineTab);
            // $Type->domaine()->attach($request->domaineTab);
           $Type->domaine()->sync($request->domaineTab);
            
        // return response()->json(['message'=>'Ajout bien fait 2']);
    }
    public function upadteDomHis(Request $request, Type_activite $type_activite)
    {
        // dd($idType);
            $idType=Type_activite::where([
                ['nom', '=', $request->nomType],
                ['personne_id', '=', $request->id]])->first();
                
                // $idTypee=$idType->id;
                // dd($idType->id);
            $Type=Domaine::find($request->domaineTab2);
            // dd($request);
            // dd($Type->domaine_historique());
           $Type->domaine_historique()->sync($request->domaineTab3,['type_id'=>$idType->id,'type_nom'=>$request->nomType]);
            
        // return response()->json(['message'=>'Ajout bien fait 2']);
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
