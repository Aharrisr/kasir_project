<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $db = Supplier::query();
        $db->select('supplier.*', 'kode_splr', 'nama_splr', 'no_hp', 'alamat');
        $db->orderBy('nama_splr');
        if (!empty($request->kode_splr)) {
            $db->where('kode_splr', 'like', '%' . $request->kode_splr . '%');
        }
        if (!empty($request->nama_splr)) {
            $db->where('nama_splr', 'like', '%' . $request->nama_splr . '%');
        }
        $supplier = $db->paginate(10);

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('supplier.index', compact('user', 'supplier'));
    }

    public function tambah(Request $request)
    {
        $supplier = DB::table('supplier')->latest('id_splr')->first();

        //Kode Produk
        $id_terbaru = $supplier ? $supplier->id_splr + 1 : 1;
        function tambah_nol_didepan($angka, $panjang)
        {
            return str_pad($angka, $panjang, '0', STR_PAD_LEFT);
        }
        $kode_splr = 'SP' . tambah_nol_didepan($id_terbaru, 6);
        $nama_splr = $request->nama_splr;
        $no_hp = $request->no_hp;
        $alamat = $request->alamat;

        try {
            $data = [
                'kode_splr'=> $kode_splr,
                'nama_splr'=> $nama_splr,
                'no_hp'=> $no_hp,
                'alamat'=> $alamat
            ];

            $simpan = DB::table('supplier')->insert($data);
            if ($simpan) {
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request)
    {
        $kode_splr = $request->kode_splr;
        $supplier = DB::table('supplier')->where('kode_splr', $kode_splr)->first();
        return view('supplier.edit', compact("supplier"));
    }

    public function update($kode_splr, Request $request)
    {
        $nama_splr = $request->nama_splr;
        $no_hp = $request->no_hp;
        $alamat = $request->alamat;

        try {
            $data = [
                "nama_splr"=> $nama_splr,
                "no_hp"=> $no_hp,
                "alamat"=> $alamat
            ];

            $update = DB::table('supplier')->where('kode_splr', $kode_splr)->update($data);
            if ($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            }
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function deletesplr($kode_splr)
    {
        $delete = DB::table('supplier')->where('kode_splr', $kode_splr)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
