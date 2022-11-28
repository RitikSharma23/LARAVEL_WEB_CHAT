<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class DataController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'fname'=>'required|alpha',
            'lname'=>'required|alpha',
            'email'=>'required|email',
            'phone'=>'required|numeric|max_digits:10|min_digits:10',
            'password'=>'required:|min:8',
            'cnf_password'=>'required|same:password'
        ]);

        $data=User::all();
        $final="";
        foreach ($data as $d){
            if($d['phone']==$request['phone']){
                $final=User::find($d['id']);break;
            }
        }

        if($final==null){

        $c=new User;
        $c->fname=$request['fname'];
        $c->lname=$request['lname'];
        $c->email=$request['email'];
        $c->phone=$request['phone'];
        $c->password=Hash::make($request['password']);
        $c->save();

          if(Auth::attempt($request->only('email','phone','password'))){
            $message="accountopen";
            return view('warning')->with(compact('message'));
          }
        }else{
            $message="userfound";
            return view('warning')->with(compact('message'));
        }

    }
    public function login(Request $request){
        $request->validate([
            'phone'=>'required|numeric|max_digits:10|min_digits:10',
            'password'=>'required:|min:8',

        ]);

        $data=User::all();
        $final="";
        foreach ($data as $d){
            if($d['phone']==$request['phone']){
                $final=User::find($d['id']);break;
            }
        }

        if($final!=null){

            if($final['active']==0){
            if(Auth::attempt($request->only('phone','password'))){
                return view('/index')->with(compact('final'));
            }else{
                $message="wrongpassword";
                return view('warning')->with(compact('message'));
            }
            }else if($final['active']==3){
                return redirect('admin');
            }else{
                $message="blocked";
                return view('warning')->with(compact('message'));
            }

        }else{$message="nouserfound";
            return view('warning')->with(compact('message'));}
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

    public function feedback(Request $r)
    {
        $d=new UserData;
        $d->phone=$r['phone'];
        $d->name=$r['name'];
        $d->email=$r['email'];
        $d->complaint=$r['complaint'];
        $d->save();

        $data=User::all();

        foreach ($data as $d){
            if($d['phone']==$r['phone']){
                $final=User::find($d['id']);break;
            }
        }

        if(Auth::check()){
            return view('/index')->with(compact('final'));
          }else{
            echo('The User name and password are invalid');
          }
    }

    public function adminpanel(){
        $data=UserData::all();
        $user=User::all();
        return view('admin')->with(compact('data','user'));
    }

    public function feeddelete(Request $r){
        $d=UserData::find($r['token']);
        $d->delete();
        return redirect('admin');
    }

    public function block(Request $r)
    {
        $d=User::find($r['token']);
        $d->active=1;
        $d->save();
        return redirect('admin');
    }
    public function unblock(Request $r)
    {
        $d=User::find($r['token']);
        $d->active=0;
        $d->save();

        return redirect('admin');
    }


    public function find(Request $r)
    {
        $r->validate([
            'fname'=>'required|alpha',
            'lname'=>'required|alpha',
            'email'=>'required|email',
            'phone'=>'required|numeric|max_digits:10|min_digits:10',
        ]);

        $data=User::all();
        $final="";
        foreach ($data as $d){
            if($d['phone']==$r['phone'] and $d['email']==$r['email']){
                $final=User::find($d['id']);break;
            }
        }

        if($final==null){
            $message="nouserfound";
            return view('warning')->with(compact('message'));
        }else{
            $id=$final['id'];
            echo $id;
            return view('setpass')->with(compact('id'));
        }
    }

    public function resetpass(Request $r)
    {
        $r->validate([
            'password'=>'required:|min:8',
            'cnf_password'=>'required|same:password'
        ]);
        $f=User::find($r['id']);
        $f->password=Hash::make($r['password']);
        $f->save();
        $message="passwordreset";
        return view('warning')->with(compact('message'));

    }
}
