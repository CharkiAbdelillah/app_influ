<?php

namespace App\Http\Controllers;

use App\Personne_info;
use App\Personne;
use Illuminate\Http\Request;

class PersonneInfoController extends Controller
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
        
        $personneInfo =Personne_info::create([
            'personne_id'=>$personne->id,
            'cm'=>$request->cm,
            'kg'=>$request->kg,
            'cheveux'=>$request->cheveux,
            'longueur'=>$request->longueur,
            'nature'=>$request->nature,
            'couleur'=>$request->couleur,
            'yeux'=>$request->yeux,
            'niveux'=>$request->niveu1,
            'specialite'=>$request->specialite,
            'situation'=>$request->situation,
            'nombre'=>$request->nombre,
        ]);
        // Personne_info::create(['personne_id'=>$personne->id]);
        return response()->json(['message'=>'Ajout bien fait']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personne_info  $personne_info
     * @return \Illuminate\Http\Response
     */
    public function show(Personne_info $personne_info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personne_info  $personne_info
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne_info $personne_info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personne_info  $personne_info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne_info $personne_info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personne_info  $personne_info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne_info $personne_info)
    {
        //
    }
}
