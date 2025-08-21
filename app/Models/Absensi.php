<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
        protected $fillable = [
        'tanggal',
        'NISN',
        'id_Kehadiran'
    
    ];
     public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'NISN');
    }

     public function kehadiran()
    {
        return $this->belongsTo(Kehadiran::class, 'id_Kehadiran');
    }

}
