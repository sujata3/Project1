<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\Events\Validator;

class filecontroller extends Controller
{
    public function demo()
    {
        return view('Hello.demo');
    }
    public function add(Request $request)
    {
            $request->validate([
                'username'=>'required|email|max:255:demos',
                'password'=>'required'
            ]);

            $query=DB::table('demos')->insert([
                'username'=>$request->input('username'),
                'password'=>$request->input('password')
            ]);
            if($query){
                return back()->with('success','successfully logged In');
            }
            else{
                return back()->with('fail','Something went wrong, try again');
            }



    }

}
         



