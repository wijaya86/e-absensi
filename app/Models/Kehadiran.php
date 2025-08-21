<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
  protected $fillable = [
        'kehadiran',
        
    ];
     public function  absensi()
    {
        return $this->hasOne(Absensi::class, 'id_Kehadiran');
    }
}
