<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Outlet extends Model
{
    protected $table = 'outlet';
    protected $primaryKey = 'outlet_id';
    protected $filleable = [
        'outlet_id', 'kode', 'nama', 'status', 'alamat', 'nohp'
    ];

    public $timestamps = false;


    public function save_outlet($data)
    {
//        $this->id = $data['id'];
        $this->kode = $data['kode'];
        $this->nama = $data['nama'];
        $this->status = $data['status'];
        $this->alamat = $data['alamat'];
        $this->nohp = $data['nohp'];

        $this->save();
        return 1;
    }

    public function update_outlet($data)
    {
        $barangnya = $this->find($data['id']);
        $barangnya->kode = $data['kode'];
        $barangnya->nama = $data['nama'];
        $barangnya->status = $data['status'];
        $barangnya->alamat = $data['alamat'];
        $barangnya->nohp = $data['nohp'];

        $barangnya->save();
        return 1;
    }
}
