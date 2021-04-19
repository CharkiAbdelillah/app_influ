<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class gstClientController extends Controller
{
    public function all_liste(){
        $users2=User::all();
        return view('admin.gstClient')->with('users1',$users2);
        // return view('admin.dashboard');
    }
}
