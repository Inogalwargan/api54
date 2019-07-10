<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Customers;

class c_customers extends Controller
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
        $data = DB::table('customers')
            ->select('customers.nama', 'customers.alamat','customers.nohp','users.name', 'customers.point', 'customers.deposit', 'customers.customers_id')
            ->join('users','id', '=', 'kurir_id')->get();
        return response($data);
    }

    public function show($id){
        $data = Customers::where('customers_id',$id)->get();

        return response ($data);
    }

    public function update(Request $request, $id){
        $barangnya = new Customers();
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute wajib diisi angka',

        ];
        $data = $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required|numeric',
            'kurir_id' => 'required|numeric',
            'point' => 'required|numeric',
            'deposit' => 'required|numeric',


        ], $messages);
        //dd($data);
        $data['customers_id'] = $id;
        $barangnya->update_customers($data);
        return response('true');
    }

    public function store(Request $request)
    {
        $barang = new Customers();

        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute wajib diisi angka',

        ];
        $data = $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required|numeric',
            'kurir_id' => 'required|numeric',
            'point' => 'required|numeric',
            'deposit' => 'required|numeric',


        ], $messages);

        $barang->save_customers($data);
        return response('true');
    }

    public function destroy($id){
        $barang = Customers::find($id);
        $barang->delete();
        $alter = DB::statement('ALTER TABLE customers AUTO_INCREMENT = 1');
        return response('Hapus Data Berhasil');
    }

    public function getIDkurir(){
        $kurir = DB::table('users')
            ->where('jabatan', 'kurir')
            ->get();
        return response($kurir);
    }
}
