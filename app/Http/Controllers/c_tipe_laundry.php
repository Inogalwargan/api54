<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Tipe_Laundry;

class c_tipe_laundry extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
//        $data = DB::table('tipe_laundry')
//            ->select('customers.nama', 'customers.alamat','customers.nohp','users.name', 'customers.point', 'customers.deposit', 'customers.customers_id')
//            ->join('users','id', '=', 'kurir_id')->get();
        $data = DB::table('tipe_laundry')->select('*')->get();
        return response($data);
    }

    public function show($id){
        $data = Tipe_Laundry::where('tipe_laundry_id',$id)->get();

        return response ($data);
    }

    public function update(Request $request, $id){
        $barangnya = new Tipe_Laundry();
        $messages = [
            'required' => ':attribute wajib diisi',

        ];
        $data = $this->validate($request, [
            'nama' => 'required',
        ], $messages);

        $data['tipe_laundry_id'] = $id;
        $barangnya->update_tipe_laundry($data);
        return response('true');
    }

    public function store(Request $request)
    {
        $barang = new Tipe_Laundry();

        $messages = [
            'required' => ':attribute wajib diisi',
        ];
        $data = $this->validate($request, [
            'nama' => 'required',
        ], $messages);

        $barang->save_tipe_laundry($data);
        return response('true');
    }

    public function destroy($id){
        $barang = Tipe_Laundry::find($id);
        $barang->delete();
        $alter = DB::statement('ALTER TABLE tipe_laundry AUTO_INCREMENT = 1');
        return response('Hapus Data Berhasil');
    }

//    public function getIDkurir(){
//        $kurir = DB::table('users')
//            ->where('jabatan', 'kurir')
//            ->get();
//        return response($kurir);
//    }
}
