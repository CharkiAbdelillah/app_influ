<?php

namespace App\Http\Controllers;

use App\Personne_info;
use App\Personne;
use App\Youtube;
use App\Snapchat;
use App\Facebook;
use Illuminate\Http\Request;
use App\Feed;
use App\Instagrame;
use App\Story;

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
        /////inta 
        $insta=Instagrame::create([
            'personne_id'=>$personne->id,
            'nombre_abonne'=>0,
            'engagement'=>'3wdev',
            'qualite'=>'3wdev',
            'like'=>0,
            'commentaire'=>0,
            'followers'=>0,
        ]);
        // dd($insta->id);
        $insta->domaine()->attach(0);
        // \Log:info($insta->id);
        Story::create([
            'instagrame_id'=>$insta->id,
            'date_1er'=>'3wdev',
            'nombre_publicaion'=>0, 
            'taux_reponse'=>0,
            'nombre_jaime'=>0,
        ]);
        Feed::create([
            'instagrame_id'=>$insta->id,
            'date_1er'=>'3wdev',
            'nombre_publicaion'=>0, 
            'taux_reponse'=>0,
            'nombre_jaime'=>0,
        ]);
        // **** snap
        $snap=Snapchat::create([
            'personne_id'=>$personne->id,
            'nombre_abonne'=>0,
            'engagement'=>'3wdev',
            'qualite'=>'3wdev',
            'like'=>0,
            'commentaire'=>0,
            'followers'=>0,
        ]);
        $snap->domaine()->attach(0);
        // **** ytb
        $ytb=Youtube::create([
            'personne_id'=>$personne->id,
            'nombre_abonne'=>0,
            'engagement'=>'3wdev',
            'qualite'=>'3wdev',
            'like'=>0,
            'commentaire'=>0,
            'followers'=>0,
        ]);
        $ytb->domaine()->attach(0);
        // **** fb
        $fb=Facebook::create([
            'personne_id'=>$personne->id,
            'nombre_abonne'=>0,
            'engagement'=>'3wdev',
            'qualite'=>'3wdev',
            'like'=>0,
            'commentaire'=>0,
            'followers'=>0,
        ]);
        $fb->domaine()->attach(0);
        
        return response()->json(['message'=>'Ajout bien fait']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personne_info  $personne_info
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $per=Personne::find($id);
        // \Log::info($per->getpersonne_info);
        return response()->json($per->getpersonne_info);
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
    public function update(Request $request, Personne_info $personne_info){
        // \Log::info('taille info per : '.$request->cm);
        // \Log::info('info per : '.$request->id);
            $personne_info->where('id',$request->id)->update([
            // $personne_info->update([
            'cheveux'=>$request->cheveux,
            'kg'=>$request->kg,
            'cm'=>$request->cm,
            'couleur'=>$request->couleur,
            'longueur'=>$request->longueur,
            'niveux'=>$request->niveux,
            'nombre'=>$request->nombre,
            'situation'=>$request->situation,
            'specialite'=>$request->specialite,
            'situation'=>$request->situation,
            'yeux'=>$request->yeux,
        ]);
        
        // Personne_info::create(['personne_id'=>$personne->id]);
        return response()->json(['message'=>'modification bien fait']);
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
