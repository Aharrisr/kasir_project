<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $db = Supplier::query();
        $db->select('supplier.*', 'kode_splr', 'nama_splr', 'no_hp', 'alamat');
        $db->orderBy('nama_splr');
        // if (!empty($request->kode_splr)) {
        //     $db->where('kode_splr', 'like', '%' . $request->kode_splr . '%');
        // }
        // if (!empty($request->tanggal)) {
        //     $db->where('tanggal', 'like', '%' . $request->tanggal . '%');
        // }
        $supplier = $db->paginate(10);

        $id = Auth::guard('user')->user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        return view('supplier.index', compact('user', 'supplier'));
    }
}
