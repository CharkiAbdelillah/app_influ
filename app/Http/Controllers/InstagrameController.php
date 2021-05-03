<?php

namespace App\Http\Controllers;

use App\Feed;
use App\Instagrame;
use App\Story;
use App\Personne;
use App\Type_activite;
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
            
            // $last_id_type=Type_activite::orderBy('created_at', 'desc')->first()->where('nom','Instagram')->get();//mn hadi man 9adax ndir $last_id_type->id,
            $last_id_type=Type_activite::orderBy('created_at', 'desc')->where('nom','Instagram')->first();
            $insta=Instagrame::create([
                'type_activite_id'=>$last_id_type->id,
                'nombre_abonne'=>$request->nombre,
                'engagement'=>$request->engagement,
                'qualite'=>$request->qualite,
                'like'=>$request->like,
                'commentaire'=>$request->comm,
                'followers'=>$request->followers,
            ]);
            // \Log:info($insta->id);
            Story::create([
                'instagrames_id'=>$insta->id,
                'date_1er'=>$request->date1s,
                'nombre_publicaion'=>$request->nombrebs, 
                'taux_reponse'=>$request->tauxs,
                'nombre_jaime'=>$request->jaimes,
            ]);
            Feed::create([
                'instagrames_id'=>$insta->id,
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
        $dom=Type_activite::where('personne_id',$id)->get();
            foreach ($dom as $d){
                if($d->nom=='Instagram'){
                    $id_insta=$d->id;
                    // \Log::info('insta id '.$d->id);
                }
            }
        $insta=Instagrame::where('type_activite_id',$id_insta)->get();
        foreach ($insta as $i){
                $id_insta_feed=$i->id;
        }
        $feed=Feed::where('instagrames_id',$id_insta_feed)->get();
        $story=Story::where('instagrames_id',$id_insta_feed)->get();                
        // $instao = (object) $insta;
        // \Log::info('insta o :'.$instao->toJson());
        // // \Log::info('insta :'.$insta->toJson()->id);
        \Log::info('feed :'.$feed);
        // dd($feed);
        \Log::info('story :'.$story);
        
        return response()->json(['insta'=>$insta,'feed'=>$feed,'story'=>$story]);
        // return response()->json($per->type_activites);
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
    public function update(Request $request, Instagrame $instagrame)
    {
        \Log::info('insta id : '.$request->id);
        DB::beginTransaction();
        try {
            
            // $last_id_type=Type_activite::orderBy('created_at', 'desc')->first()->where('nom','Instagram')->get();//mn hadi man 9adax ndir $last_id_type->id,
            // $last_id_type=Type_activite::orderBy('created_at', 'desc')->where('nom','Instagram')->first();
            \Log::info('insta id : '.$request->id);
            // $instagrame->where('id',$request->id)->update([
            //     // $personne_info->update([
            //     'cheveux'=>$request->cheveux,
            //     'kg'=>$request->kg,
            //     'cm'=>$request->cm,
            //     'couleur'=>$request->couleur,
            //     'longueur'=>$request->longueur,
            //     'niveux'=>$request->niveux,
            //     'nombre'=>$request->nombre,
            //     'situation'=>$request->situation,
            //     'specialite'=>$request->specialite,
            //     'situation'=>$request->situation,
            //     'yeux'=>$request->yeux,
            // ]);
            // \Log:info($insta->id);
            // Story::update([
            //     'instagrames_id'=>$insta->id,
            //     'date_1er'=>$request->date1s,
            //     'nombre_publicaion'=>$request->nombrebs, 
            //     'taux_reponse'=>$request->tauxs,
            //     'nombre_jaime'=>$request->jaimes,
            // ]);
            // Feed::update([
            //     'instagrames_id'=>$insta->id,
            //     'date_1er'=>$request->date1d,
            //     'nombre_publicaion'=>$request->nombrebd, 
            //     'taux_reponse'=>$request->tauxd,
            //     'nombre_jaime'=>$request->jaimed,
            // ]);
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
