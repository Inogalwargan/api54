<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customers_id';
    protected $filleable = [
        'customers_id', 'nik', 'nama', 'alamat', 'nohp', 'kurir_id', 'point', 'deposit'
    ];

    public $timestamps = false;


    public function save_customers($data)
    {
//        $this->id = $data['id'];
        $this->nik = $data['nik'];
        $this->nama = $data['nama'];
        $this->alamat = $data['alamat'];
        $this->nohp = $data['nohp'];
        $this->kurir_id = $data['kurir_id'];
        $this->point = $data['point'];
        $this->deposit = $data['deposit'];


        $this->save();
        return 1;
    }

    public function update_customers($data)
    {
        $barangnya = $this->find($data['customers_id']);
        $barangnya->nik = $data['nik'];
        $barangnya->nama = $data['nama'];
        $barangnya->alamat = $data['alamat'];
        $barangnya->nohp = $data['nohp'];
        $barangnya->kurir_id = $data['kurir_id'];
        $barangnya->point = $data['point'];
        $barangnya->deposit = $data['deposit'];

        $barangnya->save();
        return 1;
    }
}
