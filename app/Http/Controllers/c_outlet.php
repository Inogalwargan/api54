<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Outlet;

class c_outlet extends Controller
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
        $data = Outlet::all();
        return response($data);
    }

    public function show($id){
        $data = Outlet::where('outlet_id',$id)->get();

        return response ($data);
    }

    public function update(Request $request, $id){
        $barangnya = new Outlet();
        $data = $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'nohp' => 'required'

        ]);
        //dd($data);
        $data['id'] = $id;
        $barangnya->update_outlet($data);
        return response('true');
    }

//    public function update2(Request $request, $id)
//    {
//        $activity = $request->input('activity');
//        $description = $request->input(
//            'description');
//
//        $data = \App\ModelTodo::where('id',$id)->first();
//        $data->activity = $activity;
//        $data->description = $description;
//
//        if($data->save()){
//            $res['message'] = "Success!";
//            $res['value'] = "$data";
//            return response($res);
//        }
//        else{
//            $res['message'] = "Failed!";
//            return response($res);
//        }
//    }

//    public function store (Request $request){
//        $data = new ModelTodo();
//        $data->activity = $request->input('activity');
//        $data->description = $request->input('description');
//        $data->save();
//
//        return response('true');
//    }

    public function store2(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
        ];
        $barang = new Outlet();

        $data = $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',

        ], $messages);

        $barang->save_outlet($data);
        return response('true');
        //return redirect('/barang')->with('success', 'Tambah Barang'.' '.$barang->nama_barang. ' '. 'Berhasil');
    }

    public function destroy($id){
        $barang = Outlet::find($id);
        $barang->delete();
        $alter = DB::statement('ALTER TABLE outlet AUTO_INCREMENT = 1');
        return response('Hapus Data Berhasil');
    }
}
