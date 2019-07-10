<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tipe_Laundry extends Model
{
    protected $table = 'tipe_laundry';
    protected $primaryKey = 'tipe_laundry_id';
    protected $filleable = [
        'tipe_laundry_id', 'nama'
    ];

    public $timestamps = false;


    public function save_tipe_laundry($data)
    {
        $this->nama = $data['nama'];


        $this->save();
        return 1;
    }

    public function update_tipe_laundry($data)
    {
        $barangnya = $this->find($data['tipe_laundry_id']);
        $barangnya->nama = $data['nama'];

        $barangnya->save();
        return 1;
    }
}
