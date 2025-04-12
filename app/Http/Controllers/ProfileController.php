<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Redirect
};

class ProfileController extends Controller
{
    public function index(){
        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view("profile.index",compact("user"));
    }

    public function update(Request $request, $id){
        $user = DB::table("users")->where("id", $id)->first();
        $password_baru = $request->password_baru;
        $password_lama = $request->password_lama;

        if ($password_baru == ""){
            return Redirect::back()->with(['warning_null' => 'Data Gagal Diupdate']);
        }

        if (Hash::check($password_lama, $user->password)) {
            try {
            $data = [
                "password"=> Hash::make($password_baru),
            ];

            $update = DB::table('users')->where('id', $id)->update($data);
            if ($update) {
                return Redirect::back()->with(['success_pass' => 'Data Berhasil Diupdate']);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
        } else {
            return Redirect::back()->with(['warning_pass' => 'Data Gagal Diupdate']);
        }
    }
}
