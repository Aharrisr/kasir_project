<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class memberController extends Controller
{
    public function index(Request $request)
    {


        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('member.index', compact('user'));
    }
}
