<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akses extends Model
{
    protected $table = 'aksesis';
     protected $fillable = [
        'akses',
        
    ];

    public function  user()
    {
        return $this->hasOne(User::class, 'id_akses');
    }
}
