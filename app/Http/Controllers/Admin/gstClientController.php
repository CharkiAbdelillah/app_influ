<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class gstClientController extends Controller
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
        return view('admin.gstClient');
    }
    public function store(Request $request){
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
            'is_admin'=>0
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
    public function update($id){
        // dd(request('password'));
        if(request('password')!=null){
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
        // $manager=DB::table('users');
        //     // ->where('is-admin', 0);
        //     // ->orderByRaw('updated_at - created_at DESC')
        //     // ->paginate(5);
        //     // ->get();
        // $manager=User::where('is_admin','0')->paginate(5)->get();
        // $manager = DB::select('select * from users where is-admin=0');
        $manager=User::where('is_admin','0')->orderBy('created_at','DESC')->paginate(5);//where('is-admin','=', 0)->
        return response()->json($manager);        
    }
    
}
