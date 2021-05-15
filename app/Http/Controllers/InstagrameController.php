<?php

namespace App\Http\Controllers;

use App\Feed;
use App\Instagrame;
use App\Story;
use App\Personne;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InstagrameController extends Controller
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
       
        DB::beginTransaction();
        try {
            $last_id_Personne=Personne::orderBy('created_at', 'desc')->first();
            $insta=Instagrame::create([
                'personne_id'=>$last_id_Personne->id,
                'nombre_abonne'=>$request->nombre,
                'engagement'=>$request->engagement,
                'qualite'=>$request->qualite,
                'like'=>$request->like,
                'commentaire'=>$request->comm,
                'followers'=>$request->followers,
            ]);
            // dd($insta->id);
            $insta->domaine()->attach($request->domaineTab);
            // \Log:info($insta->id);
            Story::create([
                'instagrame_id'=>$insta->id,
                'date_1er'=>$request->date1s,
                'nombre_publicaion'=>$request->nombrebs, 
                'taux_reponse'=>$request->tauxs,
                'nombre_jaime'=>$request->jaimes,
            ]);
            Feed::create([
                'instagrame_id'=>$insta->id,
                'date_1er'=>$request->date1d,
                'nombre_publicaion'=>$request->nombrebd, 
                'taux_reponse'=>$request->tauxd,
                'nombre_jaime'=>$request->jaimed,
            ]);

            DB::commit();
            return response()->json(['message'=>'Ajout bien fait insta feed story']);
        } catch (Exception $e) {
        // } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message'=>'Ajout failed']);
            // return response()->json(['message1'=>'l\'Ajout failed','error'=>$th->getMessage()]);
        }
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Instagrame  $instagrame
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $insta=Instagrame::with('domaine','feed','story')->where('personne_id',$id)->first();
        return response()->json(['insta'=>$insta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instagrame  $instagrame
     * @return \Illuminate\Http\Response
     */
    public function edit(Instagrame $instagrame)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instagrame  $instagrame
     * @return \Illuminate\Http\Response
     */

     
    public function update(Request $request,Instagrame $instagrame)
    {
        // dd($request);
        // // dd('hello');
        $insta=Instagrame::where('id',$request->id)->first();
        // dd($insta);
        DB::beginTransaction();
        try {
            $insta->update([
                // $personne_info->update([
                'nombre_abonne'=>$request->nombre_abonne,
                'engagement'=>$request->engagement,
                'qualite'=>$request->qualite,
                'like'=>$request->like,
                'followers'=>$request->followers,
                'commentaire'=>$request->commentaire
            ]);
            $insta->domaine()->sync($request->arr);
            Story::where('instagrame_id',$request->id)->update([
                'date_1er'=>$request->date_1ers,
                'nombre_publicaion'=>$request->nombre_publicaions, 
                'taux_reponse'=>$request->taux_reponses,
                'nombre_jaime'=>$request->nombre_jaimes,
            ]);
            Feed::where('instagrame_id',$request->id)->update([
                'date_1er'=>$request->date_1erf,
                'nombre_publicaion'=>$request->nombre_publicaionf, 
                'taux_reponse'=>$request->taux_reponsef,
                'nombre_jaime'=>$request->nombre_jaimef,
            ]);
            DB::commit();
            return response()->json(['message'=>'modification bien fait insta feed story']);
        } catch (Exception $e) {
        // } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message'=>'modification failed']);
            // return response()->json(['message1'=>'l\'Ajout failed','error'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instagrame  $instagrame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instagrame $instagrame)
    {
        //
    }
}
