<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Facebook;
use Illuminate\Http\Request;
use App\Personne;


class FacebookController extends Controller
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
            $fb=Facebook::create([
                'personne_id'=>$last_id_Personne->id,
                'nombre_abonne'=>$request->nombre,
                'engagement'=>$request->engagement,
                'qualite'=>$request->qualite,
                'like'=>$request->like,
                'commentaire'=>$request->comm,
                'followers'=>$request->followers,
            ]);
            $fb->domaine()->attach($request->domaineTab);

            DB::commit();
            return response()->json(['message'=>'Ajout bien fait fb feed story']);
        } catch (Exception $e) {
        // } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message'=>'Ajout failed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Facebook  $facebook
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fb=Facebook::with('domaine')->where('personne_id',$id)->first();
        return response()->json(['fb'=>$fb]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facebook  $facebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Facebook $facebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facebook  $facebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facebook $facebook)
    {
        $fb=Facebook::where('id',$request->id)->first();
        // dd($insta);
        DB::beginTransaction();
        try {
            $fb->update([
                // $personne_info->update([
                'nombre_abonne'=>$request->nombre_abonne,
                'engagement'=>$request->engagement,
                'qualite'=>$request->qualite,
                'like'=>$request->like,
                'followers'=>$request->followers,
                'commentaire'=>$request->commentaire
            ]);
            $fb->domaine()->sync($request->arr);
            DB::commit();
            return response()->json(['message'=>'modification bien fait fb']);
        } catch (Exception $e) {
        // } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message'=>'modification failed']);
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facebook  $facebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facebook $facebook)
    {
        //
    }
}
