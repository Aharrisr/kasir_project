<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Hash,
    Redirect,
};

class UserController extends Controller
{
    public function index(Request $request)
    {
        $db = User::query();
        $db->select('users.*', 'id', 'nama_user', 'email', 'id_level', 'no_hp');
        $db->orderBy('nama_user');
        if (!empty($request->nama_user)) {
            $db->where('nama_user', 'like', '%' . $request->nama_user . '%');
        }
        if (!empty($request->id_level)) {
            $db->where('id_level', 'like', '%' . $request->id_level . '%');
        }
        if (!empty($request->email)) {
            $db->where('email', [$request->email]);
        }
        if (!empty($request->no_hp)) {
            $db->where('no_hp', $request->no_hp);
        }
        $users = $db->paginate(10);

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('user.index', compact('user', 'users', 'id'));
    }

    public function tambahuser(Request $request)
    {
        $nama_user = $request->nama_user;
        $email = $request->email;
        $id_level = $request->id_level;
        $no_hp = $request->no_hp;
        $password = Hash::make($request->password);

        try {
            $data = [
                'nama_user' => $nama_user,
                'email' => $email,
                'password' => $password,
                'no_hp' => $no_hp,
                'id_level' => $id_level
            ];
            $simpan = DB::table('users')->insert($data);
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('user.edit', compact("user"));
    }

    public function update($kode_produk, Request $request)
    {
        $nama_user = $request->nama_user;
        $email = $request->email;
        $no_hp = $request->no_hp;
        $id_level = $request->id_level;
        $password = Hash::make($request->password);

        try {
            $data = [
                'nama_user' => $nama_user,
                'email' => $email,
                'no_hp' => $no_hp,
                'id_level' => $id_level,
                'password'=> $password
            ];

            $update = DB::table('produk')->where('kode_produk', $kode_produk)->update($data);
            if ($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function deleteuser($id)
    {
        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
