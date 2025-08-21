<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Walikel extends Model
{
     protected $fillable = [
        'NIP',
        'NamaGuru',
        'id_Kelas'
    
    ];

    public function kelasi()
    {
        return $this->belongsTo(Kelasi::class, 'id_Kelas');
    }
}
