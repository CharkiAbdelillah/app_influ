<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class gstManagerController extends Controller
{


    public function index(){
        if(request('q')!=null){
            $users['data']=User::where('name','like','%'.request('q').'%')->get();
            return response()->json($users);
        }else{
            return $this->refresh();
        } 
        // $manager=User::orderBy('created_at','DESC')->paginate(5);
        // return response()->json($manager);

    }
    public function all_liste(){
        // $users2=User::all();
        return view('admin.gstManager');
    }
    public function store(Request $request){
        $users=User::create($request->all());
        // if($users){
        //     return $this->refresh();
        // }
        return $this->$users;
    }
    public function edit(Request $request,$id){
        $users=User::findOrFail($id);
        return response()->json($users);
    }
    public function update($id){
        $users=User::find($id);
        $users->name=request('name');
        $users->email=request('email');
        $users->password=request('password');
        $users->save();
        if($users){
            return $this->refresh();
        }

    }
    public function destroy($id){
        $users=User::find($id);
        if($users->delete()){
            return $this->refresh();
        }
        else{
            return response()->json(['error'=>'Erreur de suppression'],425);
        }
    }

    
    private function refresh(){
        $manager=User::where('is_admin','2')->orderBy('created_at','DESC')->paginate(5);//where('is-admin','=', 0)->
        return response()->json($manager);        
    }
}
