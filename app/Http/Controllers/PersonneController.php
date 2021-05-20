<?php

namespace App\Http\Controllers;

use App\Personne;
use App\Feed;
use App\Story;
use App\Instagrame;
use Illuminate\Http\Request;
use App\Personne_info;
use App\Type_activite;
use App\ActiviteDomaine;
use Illuminate\Support\Facades\DB;
use App\Domaine;
use App\Domaine_Histo_Domaine;
use App\Facebook;
use App\Snapchat;
use App\Youtube;
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
            return $this->refresh();
        
    }
    public function index2()
    {
            return $this->refresh2();
        
    }
    public function indexSearch($q)
    {
            $per=Personne::where('nom','like','%'.$q.'%')->paginate(5);
            return response()->json(['perso'=>$per]);    
    }   
    private function refresh(){
        Carbon::setlocale('fr');
        $personne=Personne::orderBy('created_at','DESC')->with('historique','instagram.domaine','instagram.feed','instagram.story','facebook.domaine','snapchat.domaine','youtube.domaine')->paginate(5);//where('is-admin','=', 0)->  
        foreach($personne as $p){
            $p->setAttribute('added',Carbon::parse($p->created_at)->diffForHumans());
            $p->setAttribute('info',$p->getpersonne_info);
            $p->setAttribute('updated',Carbon::parse($p->updated_at)->diffForHumans());
        }
        return response()->json(['perso'=>$personne]);
    }
    private function refresh2(){
        Carbon::setlocale('fr');
        $personne=Personne::orderBy('created_at','DESC')->with('historique','instagram.domaine','instagram.feed','instagram.story','facebook.domaine','snapchat.domaine','youtube.domaine')->get();//where('is-admin','=', 0)->  
        foreach($personne as $p){
            $p->setAttribute('added',Carbon::parse($p->created_at)->diffForHumans());
            $p->setAttribute('info',$p->getpersonne_info);
            $p->setAttribute('updated',Carbon::parse($p->updated_at)->diffForHumans());
        }
        return response()->json(['perso'=>$personne]);
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
        $personne->historique()->attach($request->hist);
        
        // Personne_info::create(['personne_id'=>$personne->id]);
        return response()->json(['message'=>'Ajout bien fait']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function lastInfl(){
        return Personne::orderBy('created_at','DESC')->first();
    }
    public function show($id)
    {
        // $insta=Instagrame::with('domaine','feed','story')->where('personne_id',$id)->first();
        $per=Personne::with('historique')->where('id',$id)->first();
        // dd($id);
        // dd($per);
        return response()->json($per);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne,$id)
    {
        // $personnes=findOrFail($personne->id);
        // return response()->json($personnes);
        // $users=User::findOrFail($id);
        // return response()->json($users);
    }
    public function editPersonne($id){
        $per=Personne::findOrFail($id);
        return response()->json($per);
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
        $name=null;
        $photo=$personne->photo;
        if($request->hasFile('image')){
            $name=time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'),$name);
            $photo='/images/'.$name;
        }
        // $url=explode('/',url()->current());
        $personne->update([
            'nom'=>$request->name,
            'prenom'=>$request->prenom,
            'photo'=>$photo,
            'ville'=>$request->ville,
            'date'=>$request->daten,
        ]);
        $personne->historique()->sync($request->arrHis);
        // Personne_info::create(['personne_id'=>$personne->id]);
        return response()->json(['message'=>'Ajout bien fait']);
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personne  $personne
     * @return \Illuminate\Http\Response
     */
    public function test(){
        // return "hello";
        // $type=Type_activite::where('personne_id',1)->get();
        // $type=Type_activite::where('personne_id',1)->get();
        // // $type=Type_activite::all()->where('personne_id',1);
        // foreach ($type as $key) {
        //     \Log::info($key->id);    
        //     // ActiviteDomaine::where('type_activite_id',$key->id)->delete();
        // }
        // $per=Personne::all();
        // $insta=(Object)Instagrame::where('type_activite_id',19)->get();
        // // \Log::info('idd : '.$insta[0]['id']);
        // // foreach ($insta as $i){
        // //         $id_insta_feed=$i->id;
        // // }
        // $feed=Feed::where('instagrames_id',4)->get();
        // $story=Story::where('instagrames_id',4)->get();                
        // // $instao = (object) $insta;
        // // \Log::info('insta o :'.$instao->toJson());
        // \Log::info('insta :'.$insta[0]['nombre_abonne']);
        // \Log::info('feed :'.$feed);
        // // dd($feed);
        // \Log::info('story :'.$story);
        
        // return response()->json([$insta,$feed,$story]);
        // $insta=Instagrame::where('type_activite_id',2)->get()->first();
        // $insta=Instagrame::where('id',4)->get()->first();
        //     Feed::where('instagrames_id',$insta->id)->delete();
        //     Story::where('instagrames_id',$insta->id)->delete();
            // where([
            //     ['personne_id', '=', 1],
            //     ['nom', '<>', 'Youtube'],
            //     ])
                // $type=Type_activite::where('personne_id',  1)->where('nom',  'Youtube');
                        // ['personne_id',  '1'],
                        // ['nom', 'Youtube'],
                        // ]);
        // $insta->feed->delete();
        // $insta->story->delete();
        // \Log::info($type);
        // \Log::info("hi");instagrames_id

                //partie show info
        // $personne=Personne::where('personne_id',  1);
        // $personne=Personne::all();
        // foreach($personne as $p){
        //     $p->setAttribute('type',$p->type_activites);//had user deja kayna f model User 7it kola post endo user//->where('personne_id',$p->id)
        //     // $p->setAttribute('info',$p->getpersonne_info);
        // }
        // \Log::info($personne);


        // $rr=Type_activite::with('domaine.domaine_historique.domaine_his')->where('personne_id',10)->get();
        //         \Log::info('type '.$rr);  

                // $rr=Type_activite::orderBy('created_at','DESC')->first();
                // \Log::info('type '.$rr->id);  
        // $per=Personne::find(24);
        // \Log::info($per->getpersonne_info);
        // $insta=Instagrame::where('type_activite_id',19)->get();
        // \Log::info('feed :'.$insta);
        // return response()->json($per);
//delete verifier
        // $dom=Type_activite::where('personne_id',24)->get();
        //         foreach ($dom as $d){
        //             $typeid=$d->id;
        //             $typenom=$d->nom;
        //             \Log::info('type id '.$typeid);  
        //             \Log::info('type nom '.$typenom);
        //             // if($d->nom=='Instagram'){
        //             //     $ff2=$d->instagrame->id;  
        //             //     // \Log::info('insta '.$d->instagrame->id);  
        //             // }
        //                 foreach($d->domaine as $his){
        //                     \Log::info('dom '.$his->nom);
        //                     $domId=$his->id;
        //                     \Log::info('dom id : '.$domId);
        //                     $activeDom=$his->pivot->id;
        //                     DB::table('activite_domaines')->where('id', $activeDom)->delete();        
        //                     foreach($his->domaine_historique as $his2){
        //                             if($his2->pivot->type_id==$typeid && $typenom==$his2->pivot->type_nom && $domId==$his2->pivot->domaine_id){
        //                                 \Log::info('his '.$his2->nom); //&& $typenom==$kk->type_id
        //                                 \Log::info('his id '.$his2->pivot->id);
        //                                 $id_his_dom=$his2->pivot->id;
        //                                 DB::table('domaine__histo__domaines')->where('id', $id_his_dom)->delete();        
        //                             }   
        //                     }   
        //                }   
        //                DB::table('type_activites')->where('id', $typeid)->delete();        
        //         }
        //         if(isset($ff2)){
        //             DB::table('feeds')->where('instagrames_id', $ff2)->delete();        
        //             DB::table('stories')->where('instagrames_id', $ff2)->delete();        
        //             DB::table('instagrames')->where('id', $ff2)->delete();        
        //         }
//delete ver
//verifier
            $personne=Personne::where('id',27)->get();
            \Log::info('personne '.$personne);
            // \Log::info('personne info '.$personne->getpersonne_info);
        $dom=Type_activite::where('personne_id',27)->get();
        // \Log::info('dom objetc '.$dom);
            foreach ($dom as $d){
                $typeid=$d->id;
                $typenom=$d->nom;
                \Log::info('type id '.$typeid);  
                \Log::info('type nom '.$typenom);
                // if($d->nom=='Instagram'){
                //     // $ff2=$d->instagrame;  
                //     \Log::info('insta id '.$d->instagrame->id);  
                // }
                    foreach($d->domaine as $his){
                        \Log::info('dom '.$his->nom);
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
            if(isset($ff2)){
                $dom2=Feed::where('instagrames_id',$ff2)->get();
                $dom3=Story::where('instagrames_id',$ff2)->get();
                \Log::info('feed '.$dom2);
                \Log::info('story '.$dom3);
            }
//verifier************            



//verifier1
// $personne=Personne::where('id',22);
// // $personne->delete();
// // \Log::info('personne info '.$personne->getpersonne_info);
// $dom=Type_activite::where('personne_id',22);
// // $dom1=Type_activite::where('personne_id',19);
// // $dom1->delete();
// foreach ($dom as $d){
//     $typeid=$d->id;
//     $typenom=$d->nom;
//     if($d->nom=='Instagram'){
//         $ff2=$d->instagrame->id;  
//     }
//         foreach($d->domaine as $his){
//             $domId=$his->id;
//             foreach($his->domaine_historique as $his2){
//                     if($his2->pivot->type_id==$typeid && $typenom==$his2->pivot->type_nom && $domId==$his2->pivot->domaine_id){
//                       $id_his_dom=$his2->pivot->id;
//                       \Log::info('idddddddd : '.$id_his_dom);
//                       \Log::info('idddddddd : ');
//                       //&& $typenom==$kk->type_id
//                     }   
//                     // DB::table('domaine__histo__domaines')->where('id', $id_his_dom)->delete();        
//             }
//             // DB::table('domaines')->where('id', $domId)->delete();
//        }
// }

//delete
        // $dom=Type_activite::where('personne_id',23)->get();
        //     foreach ($dom as $d){
        //         $typeid=$d->id;
        //         $typenom=$d->nom;
        //         \Log::info('type id '.$typeid);  
        //         \Log::info('type nom '.$typenom);
        //         if($d->nom=='Instagram'){
        //             $ff2=$d->instagrame->id;  
        //             // \Log::info('insta '.$d->instagrame->id);  
        //         }
        //             foreach($d->domaine as $his){
        //                 \Log::info('dom '.$his->nom);
        //                 // $domId=$his->id;
        //                 $activeDom=$his->pivot->id;
        //                 DB::table('activite_domaines')->where('id', $activeDom)->delete();        
        //                 foreach($his->domaine_historique as $his2){
        //                         if($his2->pivot->type_id==$typeid && $typenom==$his2->pivot->type_nom && $domId==$his2->pivot->domaine_id){
        //                             // \Log::info('his '.$his2->nom); //&& $typenom==$kk->type_id
        //                             $id_his_dom=$his2->pivot->id;
        //                             DB::table('domaine__histo__domaines')->where('id', $id_his_dom)->delete();        
        //                         }   
        //                 }   
        //            }   
        //         //    DB::table('type_activites')->where('id', $typeid)->delete();        
        //     }
        //     if(isset($ff2)){
        //         DB::table('feeds')->where('instagrames_id', $ff2)->delete();        
        //         DB::table('stories')->where('instagrames_id', $ff2)->delete();        
        //         DB::table('instagrames')->where('id', $ff2)->delete();        
        //     }
        //     // $personne=Personne::where('id',9);            
            // // $personne->type_activites->delete();
            // $personne->getpersonne_info->delete();
            // $personne->delete();
            // $type=Type_activite::where('personne_id',23);
            // $type->instagrame->feed->delete();    
            // $type->instagrame->story->delete();    
            // $type->instagrame->delete();    
            // $type->domaine->delete();
            // Type_activite::where('personne_id',23)->delete();
// $type=Type_activite::where('personne_id',21);
//         Type_activite::where('personne_id',21)->delete();
//         $type->domaine->delete(); 
// if(isset($ff2)){
//     $dom2=Feed::where('instagrames_id',$ff2);
//     $dom3=Story::where('instagrames_id',$ff2);
//     $dom2->delete();
//     $dom3->delete();
//     DB::table('instagrames')->where('id', $ff2)->delete();
// }
//verifier1************


        // $rr=Type_activite::where('personne_id',9)->get();
        // // $rr->domaine
        // \Log::info('dom : '.$rr);
        // foreach($rr as $e){
        //     \Log::info('dom : '.$e->domaine);
        //     $e1=$e->domaine;
        //     foreach($e1 as $k){
        //         \Log::info('his : '.$k->domaine_historique);
        //     }
        // }
        // $type->domaine->delete();
        // $personne1=getpersonne_info->delete();
        // $personne2=Personne::where('id',9)->get();
        // $personne2=Personne::where('id',9)->get();
        
        // \Log::info('personne '.$personne);
        // \Log::info('pers info '.$personne->getpersonne_info);
        // \Log::info('pers info '.$personne->type_activites);
        // $personne->getpersonne_info->delete();
        // // $personne->type_activites->delete();
        // $type=Type_activite::where('personne_id',$personne->id);
        // Type_activite::where('personne_id',$personne->id)->delete();
        // $type->domaine->delete();
        
        // $dom=Type_activite::where('personne_id',9)->get();
        // Type_activite::where('personne_id',9)->delete();
        //     foreach ($dom as $d) {
        //         // \Log::info('type '.$d->nom);  
        //         // \Log::info('insta '.$d->instagrame->id);  
        //         $ff2=$d->instagrame->id;  
        //         $d->instagrame->delete();  
        //             foreach($d->domaine as $his){
        //                 // \Log::info('dom'.$his);  
        //                 $his->delete();
        //                 foreach($his->domaine_historique as $his2){
        //                     // \Log::info('his '.$his2);  
        //                     $his2->delete();
        //                 }   
        //            }   
        //     }
        //     $dom2=Feed::where('instagrames_id',$ff2)->get();
        //     $dom3=Story::where('instagrames_id',$ff2)->get();
        //     // \Log::info('feed '.$dom2);
        //     $dom2->delete();
        //     $dom3->delete();
        // $type=Type_activite::where('personne_id',23)->get();
        // // Type_activite::where('personne_id',23)->delete();
        // // \Log::info($type->instagrame);
        // if($type->instagrame->delete()){
        //     return true;
        //  }
        //  return false;
        // $type->instagrame->delete();
        // $dom=Type_activite::where('personne_id',9);
        // Type_activite::where('personne_id',9)->delete();
        //     foreach ($dom as $d) {
        //         $ff2=$d->instagrame->id;
        //         $d->instagrame->delete();  
        //             foreach($d->domaine as $his){
        //                 $his->delete();
        //                 foreach($his->domaine_historique as $his2){
        //                     $his2->delete();
        //                 }   
        //            }   
        //     }
        //     $dom2=Feed::where('instagrames_id',$ff2);
        //     $dom3=Story::where('instagrames_id',$ff2);
        //     // \Log::info('feed '.$dom2);
        //     // \Log::info('feed '.$dom3);
        //     $dom2->delete();
        //     $dom3->delete();
        // $rel=$personne->type_activite_domaine;
        // \Log::info($rel);
        // $pivot_entries  = DB::table('domaine__histo__domaines')
        //                  ->where('pivot_column1', 'pivot value 1')
		//          ->where('pivot_column_2', 'pivot value 2')
        //              	 ->get();
        // foreach($personne as $p){
        //     $p->setAttribute('dom',$p->domaine_historique);//had user deja kayna f model User 7it kola post endo user//->where('personne_id',$p->id)
        //     $p->setAttribute('type',$p->type_activite_domaine);
        // }
        // \Log::info($personne);
    }
    public function destroy(Personne $personne)
    {
        // dd($personne->getpersonne_info);
        DB::beginTransaction();
        try {
        $insta=Instagrame::where('personne_id',$personne->id)->first();
        $fb=Facebook::where('personne_id',$personne->id)->first();
        $ytb=Youtube::where('personne_id',$personne->id)->first();
        $snap=Snapchat::where('personne_id',$personne->id)->first();
        $fb->domaine()->detach();
        if($insta)
           $insta->domaine()->detach();
        $ytb->domaine()->detach();
        $snap->domaine()->detach();
        $personne->historique()->detach();
        if($personne->getpersonne_info)
            $personne->getpersonne_info->delete();
        $personne->delete();
        DB::commit();
        return response()->json(['message'=>'suppression bien fait personne']);
        } catch (Exception $e) {
        DB::rollback();
            return response()->json(['message'=>'suppression failed']);
        }
    }
}
