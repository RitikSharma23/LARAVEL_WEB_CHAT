<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
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

        $data=User::all();

        // echo "<pre>";
        // print_r($data->toArray());

        foreach ($data as $d){
            if($d['phone']==$request['phone']){
                $final=User::find($d['id']);break;
            }
        }

        if(Auth::attempt($request->only('phone','password'))){
            return view('/index')->with(compact('final'));
          }else{
            return redirect('/registerpage');
          }
    }

    public function prof(Request $request){
        if(Auth::check()){
            $d=User::find($request);
        $data=$d[0];
        return view('profile')->with(compact('data'));
        }else{
            return redirect('/loginpage');
        }

    }

    public function doupdate(Request $request){
        if(Auth::check()){
            $data=User::find($request['id']);
        $data->fname=$request['fname'];
        $data->lname=$request['lname'];
        $data->email=$request['email'];
        $data->phone=$request['phone'];
        if($request['password']!="" and $request['cnf_password']!=""){
        $data->password= Hash::make($request['password']);
        }

        $data->save();
        return view('profile')->with(compact('data'));
        }else{
            return redirect('/loginpage');
        }

    }

    public function log() {
        // Session::flush();
        Auth::logout();

        return Redirect('home');


    }
}
