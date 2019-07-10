<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Harga_Laundry extends Model
{
    protected $table = 'harga_laundry';
    protected $primaryKey = 'harga_laundry_id';
    protected $filleable = [
        'harga_laundry_id', 'tipe_laundry_id', 'harga', 'jenis_kilogram', 'user_id'
    ];

    public $timestamps = false;


    public function save_harga_laundry($data)
    {
        $this->tipe_laundry_id = $data['tipe_laundry_id'];
        $this->harga = $data['harga'];
        $this->jenis_kilogram = $data['jenis_kilogram'];
        $this->user_id = $data['user_id'];

        $this->save();
        return 1;
    }

    public function update_harga_laundry($data)
    {
        $barangnya = $this->find($data['harga_laundry_id']);
        $barangnya->tipe_laundry_id = $data['tipe_laundry_id'];
        $barangnya->harga = $data['harga'];
        $barangnya->jenis_kilogram = $data['jenis_kilogram'];
        $barangnya->user_id = $data['user_id'];

        $barangnya->save();
        return 1;
    }
}
