<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function register(Request $request){
        echo "<pre>";
        print_r($request->toArray());

    }
    public function login(Request $request){
        echo "<pre>";
        print_r($request->toArray());
    }
}
