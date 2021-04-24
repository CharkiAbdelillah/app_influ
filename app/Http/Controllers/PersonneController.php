<?php

namespace App\Http\Controllers;

use App\Personne;
use Illuminate\Http\Request;
use App\Personne_info;
use Illuminate\Support\Carbon;
class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setlocale('fr');
        $personne=Personne::orderBy('created_at','DESC')->paginate(5);//where('is-admin','=', 0)->  
        return response()->json($personne);
    }
    public function getLastId()
    {
        $personne=Personne::orderBy('created_at', 'desc')->first();
        return response()->json($personne->id);
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
        $name=null;
        if($request->hasFile('image')){
            $name=time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'),$name);
        }
        // $url=explode('/',url()->current());
        $personne =Personne::create([
            'nom'=>$request->name,
            'prenom'=>$request->prenom,
            'photo'=>'/images/'.$name,
            'ville'=>$request->ville,
            'date'=>$request->daten,
        ]);
        // Personne_info::create(['personne_id'=>$personne->id]);
        return response()->json(['message'=>'Ajout bien fait']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne $personne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        //
    }
}
