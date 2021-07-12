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
                'username'=>'required|email:demos',
                'password'=>'required|alphaNum|min:3'
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
            $user_data = array(
                'username'=> $request->get('username'),
                'password' => $request->get('password')
            );

            if(Auth::attempt($user_data)){
                return redirect('user.add');
            }
            else{
                return back()->with('error', 'Wrong login details');
            }
    }
    Function successlogin(){
        return view('Hello.Successlogin');
    }
    // function logout()
    // {
    //     Auth::logout();
    //     return redirect('user.add');
    // }
}
         



