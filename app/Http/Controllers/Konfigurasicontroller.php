<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Redirect
};

class Konfigurasicontroller extends Controller
{

    public function index(){
        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('konfigurasi.index', compact('user'));
    }
}
