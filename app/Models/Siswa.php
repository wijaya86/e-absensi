<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'NISN',
        'NamaSiswa',
        'id_Kelas',
        'qrcode',
        'Jenkel',
        'foto'
    ];

     public function kelasi()
    {
        return $this->belongsTo(Kelasi::class, 'id_Kelas', 'id');
    }
      public function  absensi()
    {
        return $this->hasOne(Absensi::class, 'NISN');
    }
}
