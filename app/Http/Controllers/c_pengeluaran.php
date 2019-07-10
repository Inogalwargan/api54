<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Pengeluaran;

class c_pengeluaran extends Controller
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
        $data = DB::table('pengeluaran')
            ->select('users.name','pengeluaran.*')
            ->join('users','users.id', '=', 'pengeluaran.user_id')->get();
        return response($data);
    }

    public function show($id){
        $data = Pengeluaran::where('pengeluaran_id',$id)->get();

        return response ($data);
    }

    public function update(Request $request, $id){
        $barangnya = new Pengeluaran();
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute wajib diisi angka',

        ];
        $data = $this->validate($request, [
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'nota' => 'required',
            'user_id' => 'required|numeric',

        ], $messages);
        //dd($data);
        $data['pengeluaran_id'] = $id;
        $barangnya->update_pengeluaran($data);
        return response('true');
    }

    public function store(Request $request)
    {
        $barang = new Pengeluaran();

        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute wajib diisi angka',

        ];
        $data = $this->validate($request, [
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'nota' => 'required',
            'user_id' => 'required|numeric',


        ], $messages);

        $barang->save_pengeluaran($data);
        return response('true');
    }

    public function destroy($id){
        $barang = Pengeluaran::find($id);
        $barang->delete();
        $alter = DB::statement('ALTER TABLE pengeluaran AUTO_INCREMENT = 1');
        return response('Hapus Data Berhasil');
    }
}
