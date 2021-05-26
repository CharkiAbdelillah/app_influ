<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class gstManagerController extends Controller
{
    public function index(){
        if(request('q')!=null){
            $users['data']=User::where('name','like','%'.request('q').'%')->get();
            return response()->json($users);
        }else{
            return $this->refresh();
        } 
    }
    public function all_liste(){
        return view('admin.gstManager');
    }

    // public function store(Request $request){
    //     $users=User::create($request->all());
    //     return $this->$users;
    // }
    public function store(Request $request){
        // dd('hello');
        // $users=User::create($request->all());
        $this->validate($request,[
            'name'=>'required',
            'email'=>'bail|required|email',
            'pass'=>'bail|required|min:6',
        ]);
        $password=bcrypt($request->pass);
        $users=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password,
            'is_admin'=>2
        ]);
        if($users){
            return $this->refresh();
        }
        // return $users;
    }

    public function edit(Request $request,$id){
        $users=User::findOrFail($id);
        return response()->json($users);
    }
    
    // public function update($id){
    //     $users=User::find($id);
    //     $users->name=request('name');
    //     $users->email=request('email');
    //     $users->password=request('password');
    //     $users->save();
    //     if($users){
    //         return $this->refresh();
    //     }

    // }
    public function update($id){
        // dd(request('password'));
        if(request('password')!=null){
            // dd('password is definded');
            $users=User::find($id);
            $users->name=request('name');
            $users->email=request('email');
            $users->password=bcrypt(request('password'));
            $users->save();
            if($users){
                return $this->refresh();
            }
        }
        else{
            // dd('password is not definded');
            $users=User::find($id);
            $users->name=request('name');
            $users->email=request('email');
            $users->save();
            if($users){
                return $this->refresh();
            }
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
        foreach($manager as $p){
            $p->setAttribute('added',Carbon::parse($p->created_at)->diffForHumans());
            $p->setAttribute('info',$p->getpersonne_info);
            $p->setAttribute('updated',Carbon::parse($p->updated_at)->diffForHumans());
        }
        return response()->json($manager);        
    }
}
