<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class memberController extends Controller
{
    public function index(Request $request)
    {
        $db = member::query();
        $db->select('member.*', 'nama', 'alamat', 'no_hp');
        $db->orderBy('id_member');
        // if (!empty($request->kode_produk)) {
        //     $db->where('kode_produk', 'like', '%' . $request->kode_produk . '%');
        // }
        // if (!empty($request->nama_produk)) {
        //     $db->where('nama_produk', 'like', '%' . $request->nama_produk . '%');
        // }
        // if (!empty($request->nama_splr)) {
        //     $db->where('nama_splr', 'like', '%' . $request->nama_splr . '%');
        // }
        $member = $db->paginate(10);

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('member.index', compact('user','member'));
    }

    public function tambah(Request $request)
    {
        $nama = $request->nama;
        $no_hp = $request->no_hp;
        $alamat = $request->alamat;

        try {
            $data = [
                'nama' => $nama,
                'no_hp' => $no_hp,
                'alamat' => $alamat
            ];

            $simpan = DB::table('member')->insert($data);
            if ($simpan) {
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }
}
