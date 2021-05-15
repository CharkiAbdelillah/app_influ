<?php

namespace App\Http\Controllers;

use App\Youtube;
use App\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class YoutubeController extends Controller
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
            $youtube=Youtube::create([
                'personne_id'=>$last_id_Personne->id,
                'nombre_abonne'=>$request->nombre,
                'engagement'=>$request->engagement,
                'qualite'=>$request->qualite,
                'like'=>$request->like,
                'commentaire'=>$request->comm,
                'followers'=>$request->followers,
            ]);
            $youtube->domaine()->attach($request->domaineTab);

            DB::commit();
            return response()->json(['message'=>'Ajout bien fait youtube']);
        } catch (Exception $e) {
        // } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message'=>'Ajout failed']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Youtube  $youtube
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ytb=Youtube::with('domaine')->where('personne_id',$id)->first();
        return response()->json(['ytb'=>$ytb]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Youtube  $youtube
     * @return \Illuminate\Http\Response
     */
    public function edit(Youtube $youtube)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Youtube  $youtube
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Youtube $youtube)
    {
        $ytb=Youtube::where('id',$request->id)->first();
        // dd($insta);
        DB::beginTransaction();
        try {
            $ytb->update([
                // $personne_info->update([
                'nombre_abonne'=>$request->nombre_abonne,
                'engagement'=>$request->engagement,
                'qualite'=>$request->qualite,
                'like'=>$request->like,
                'followers'=>$request->followers,
                'commentaire'=>$request->commentaire
            ]);
            $ytb->domaine()->sync($request->arr);
            DB::commit();
            return response()->json(['message'=>'modification bien fait ytb']);
        } catch (Exception $e) {
        // } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message'=>'modification failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Youtube  $youtube
     * @return \Illuminate\Http\Response
     */
    public function destroy(Youtube $youtube)
    {
        //
    }
}
