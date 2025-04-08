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

        $id_setting = DB::table('setting')->where('id_setting')->value('id_setting');

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('konfigurasi.index', compact('user', 'setting', 'id_setting'));
    }

    public function update(Request $request){
        $id_setting = $request->id_setting;
        $alamat = $request->alamat;
        $diskon_member = preg_replace('/\D/', '', $request->diskon_member);
        $nama_toko = $request->nama_toko;

        try {
            $data = [
                'alamat' => $alamat,
                'diskon_member' => $diskon_member,
                'nama_toko'=> $nama_toko,
            ];

            $update = DB::table('setting')->where('id_setting', $id_setting)->update($data);
            if ($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }
}
