<?php

namespace App\Http\Controllers;

use App\Domaine_historique;
use Illuminate\Http\Request;

class DomaineHistoriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domine=Domaine_historique::all();
        return response()->json($domine);
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
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domaine_historique  $domaine_historique
     * @return \Illuminate\Http\Response
     */
    public function show(Domaine_historique $domaine_historique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Domaine_historique  $domaine_historique
     * @return \Illuminate\Http\Response
     */
    public function edit(Domaine_historique $domaine_historique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domaine_historique  $domaine_historique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domaine_historique $domaine_historique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domaine_historique  $domaine_historique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domaine_historique $domaine_historique)
    {
        //
    }
}
