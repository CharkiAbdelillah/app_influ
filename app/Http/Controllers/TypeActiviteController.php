<?php

namespace App\Http\Controllers;

use App\Type_activite;
use Illuminate\Http\Request;
use App\Personne;
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
        $domaines=$request->domtab;
        
        $personne=Personne::orderBy('created_at', 'desc')->first();
        $personne->type_activites()->create([
            'nom'=>$request->nom,
        ]);
        // return response()->json(['message'=>'Ajout bien fait']);
        \Log::info($domaines,$personne->id);
            // foreach($domaines as $c){
            //     ActiviteDomaine::create({
            //         'type_activite_id'=> $c,
            //         'domaine_id'=>$personne->id,

            //     });
            // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type_activite  $type_activite
     * @return \Illuminate\Http\Response
     */

    public function show(Type_activite $type_activite)
    {
        //
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
