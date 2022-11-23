<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function register(Request $request){
        // $request->validate([
        //     'fname'=>'required|alpha',
        //     'lname'=>'required|alpha',
        //     'email'=>'required|email',
        //     'phone'=>'required|numeric|max_digits:10|min_digits:10',
        //     'password'=>'required:',
        //     'cnf_password'=>'required|same:password'
        // ]);


        $c=new User;
        $c->fname=$request['fname'];
        $c->lname=$request['lname'];
        $c->email=$request['email'];
        $c->phone=$request['phone'];
        $c->password=Hash::make($request['password']);
        $c->save();

          if(Auth::attempt($request->only('email','password'))){
            return redirect('/loginpage');
          }else{
            echo "not";
          }

    }
    public function login(Request $request){
        echo "<pre>";
        print_r($request->toArray());

        if(Auth::attempt($request->only('phone','password'))){
            return redirect('/index');
          }else{
            return redirect('/registerpage');

          }
    }
}
