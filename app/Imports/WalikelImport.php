<?php

namespace App\Imports;

use App\Models\Walikel;
use App\Models\User;
//import encrypt password
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class WalikelImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $walikel = Walikel::updateOrCreate(
            ['NIP' => $row['nip']],
            [
                'NamaGuru' => $row['namaguru'], // pastikan heading Excel sesuai (huruf kecil/kapital sensitif)
                'id_Kelas' => $row['id_kelas'],
            ]
        );

        // Simpan atau update user untuk wali kelas
        $user = User::updateOrCreate(
            ['NIP' => $row['nip']], // pastikan relasi by NIP, bukan hanya nama
            [
                'name'     => $row['name'],
                'email'    => $row['email'],
                'password' => Hash::make($row['password']), // jangan simpan plain password!
                'id_akses' => $row['id_akses'],
            ]
        );

        return $walikel; // atau bisa return $user sesuai kebutuhan
    }

    public function headingRow(): int
    {
        return 1; // Header ada di baris pertama
    }
}
