<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use Faker\Core\File;
use FPDF;
use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\Access\Response as AccessResponse;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Psy\VersionUpdater\Downloader;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{

    public function import(Request $request){
        Excel::import(new ImportUser, $request->file('file')->store('files'));
        $data=UserData::all();
                $user=User::all();
                return view('admin')->with(compact('data','user'));
    }


    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }



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
            }else if($final['active']=="3" ){
                if(Auth::attempt($request->only('phone','password'))){
                $data=UserData::all();
                $user=User::all();
                return view('admin')->with(compact('data','user'));
                }else{
                $message="nouserfound";
                return view('warning')->with(compact('message'));
                }

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

         if($request->image!=null){
            $request->image->move(public_path('profile'),$request['fname'].".jpg");

    }



        if(Auth::check()){
        $data=User::find($request['id']);

        rename("C:/Users/ritik/OneDrive/Desktop/LARAVEL_web_CHATTING/LARAVEL_web_CHATTING/LARAVEL CHATTING/web-chat/public/profile/".$data['fname'].".jpg","C:/Users/ritik/OneDrive/Desktop/LARAVEL_web_CHATTING/LARAVEL_web_CHATTING/LARAVEL CHATTING/web-chat/public/profile/".$request['fname'].".jpg");


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


    public function feeddelete(Request $r){
        $d=UserData::find($r['token']);
        $d->delete();
        $data=UserData::all();
                $user=User::all();
                return view('admin')->with(compact('data','user'));
    }

    public function block(Request $r)
    {
        $d=User::find($r['token']);
        $d->active=1;
        $d->save();
        $data=UserData::all();
                $user=User::all();
                return view('admin')->with(compact('data','user'));
    }

    public function unblock(Request $r)
    {
        $d=User::find($r['token']);
        $d->active=0;
        $d->save();

        $data=UserData::all();
                $user=User::all();
                return view('admin')->with(compact('data','user'));
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


    public function excel(){

        $myfile = fopen("result.xls", "w") or die("Unable to open file!");
        fwrite($myfile, 'Token ID' . "\t" . 'Name' . "\t" . 'Phone' . "\t" . 'Email' . "\t" . 'Feedback'. "\n");

        $data=UserData::all();

        foreach($data as $d){
            fwrite($myfile, $d['id'] . "\t" . $d['name']  . "\t" . $d['phone']  . "\t" . $d['email']  . "\t" . $d['complaint'] . "\n");
        }
        fclose($myfile);

        $myFile = public_path("result.xls");

        require('fpdf.php');
        $pdf=new FPDF();

        ob_end_clean();
        $pdf->AddPage();
        $pdf->SetFont('Arial','', 18);

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(37,10,'Token ID',1,0,'C',false);
        $pdf->Cell(37,10,'Name',1,0,'C',false);
        $pdf->Cell(37,10,'Phone',1,0,'C',false);
        $pdf->Cell(37,10,'Email',1,0,'C',false);
        $pdf->Cell(37,10,'Feedback',1,1,'C',false);

                foreach($data as $d){
            $pdf->SetFont('Arial','B',9);

            $pdf->Cell(37,10,$d['id'],1,0,'C',false);
            $pdf->Cell(37,10,$d['name'],1,0,'C',false);
            $pdf->Cell(37,10,$d['phone'],1,0,'C',false);
            $pdf->Cell(37,10,$d['email'],1,0,'C',false);
            $pdf->Cell(37,10,$d['complaint'],1,1,'C',false);


        }


        $pdf->Output('my_file.pdf','D');
        // sleep(50);

        return response()->download($myFile);

    }












}
