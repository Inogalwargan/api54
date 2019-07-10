<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $primaryKey = 'pengeluaran_id';
    protected $filleable = [
        'pengeluaran_id', 'deskripsi', 'harga', 'nota', 'user_id'
    ];

    public $timestamps = false;


    public function save_pengeluaran($data)
    {
        $this->deskripsi = $data['deskripsi'];
        $this->harga = $data['harga'];
        $this->nota = $data['nota'];
        $this->user_id = $data['user_id'];

        $this->save();
        return 1;
    }

    public function update_pengeluaran($data)
    {
        $barangnya = $this->find($data['pengeluaran_id']);
        $barangnya->deskripsi = $data['deskripsi'];
        $barangnya->harga = $data['harga'];
        $barangnya->nota = $data['nota'];
        $barangnya->user_id = $data['user_id'];

        $barangnya->save();
        return 1;
    }
}
