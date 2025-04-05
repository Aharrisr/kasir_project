<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Redirect
};

class Konfigurasicontroller extends Controller
{

    public function index(){
        $db = Setting::query();
        $db->select('setting.*', 'id_setting', 'nama_toko', 'diskon_member');
        $db->orderBy('nama_toko');
        $setting = $db->paginate();

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('konfigurasi.index', compact('user', 'setting'));
    }
}
