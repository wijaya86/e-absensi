<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelasi extends Model
{
     protected $table = 'kelasis';   // nama tabel di DB
    protected $primaryKey = 'id'; // kalau PK nya id_Kelas
   protected $fillable = [
        'NamaKelas',
        'Jurusan'
        
    ];

    public function  walikel()
    {
        return $this->hasOne(Wlikel::class, 'id_Kelas');
    }

     public function  siswa()
    {
        return $this->hasOne(Siswa::class, 'id_Kelas');
    }
}
