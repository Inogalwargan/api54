<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Harga_Laundry;

class c_harga_laundry extends Controller
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

    public function index($id){
        $data = DB::table('users')
            ->join('harga_laundry', 'users.id', '=', 'harga_laundry.user_id')
            ->join('tipe_laundry', 'tipe_laundry.tipe_laundry_id', '=', 'harga_laundry.tipe_laundry_id')
            ->select('users.*', 'tipe_laundry.*', 'harga_laundry.*')
            ->where('tipe_laundry.tipe_laundry_id' , '=', $id)
            ->get();
        return response($data);
    }

    public function show($id){
        $data = Harga_Laundry::where('harga_laundry_id',$id)->get();

        return response ($data);
    }

    public function update(Request $request, $id){
        $barangnya = new Harga_Laundry();
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute wajib diisi angka',

        ];
        $data = $this->validate($request, [
            'tipe_laundry_id' => 'required|numeric',
            'harga' => 'required|numeric',
            'jenis_kilogram' => 'required',
            'user_id' => 'required|numeric',
        ], $messages);
        //dd($data);
        $data['harga_laundry_id'] = $id;
        $barangnya->update_harga_laundry($data);
        return response('true');
    }

    public function store(Request $request)
    {
        $barang = new Harga_Laundry();

        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute wajib diisi angka',

        ];
        $data = $this->validate($request, [
            'tipe_laundry_id' => 'required|numeric',
            'harga' => 'required|numeric',
            'jenis_kilogram' => 'required',
            'user_id' => 'required|numeric',
        ], $messages);

        $barang->save_harga_laundry($data);
        return response('true');
    }

    public function destroy($id){
        $barang = Harga_Laundry::find($id);
        $barang->delete();
        $alter = DB::statement('ALTER TABLE harga_laundry AUTO_INCREMENT = 1');
        return response('Hapus Data Berhasil');
    }

//    public function getIDkurir(){
//        $kurir = DB::table('users')
//            ->where('jabatan', 'kurir')
//            ->get();
//        return response($kurir);
//    }
}
