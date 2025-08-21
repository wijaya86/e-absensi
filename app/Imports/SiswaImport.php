<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $siswa = Siswa::updateOrCreate(
            ['NISN' => $row['nisn']],
            [
                'NamaSiswa' => $row['namasiswa'],
                'id_Kelas'  => $row['id_kelas'],
                'Jenkel'    => $row['jenkel'],
            ]
        );

        // // Jika ada kolom foto dan file-nya ada di folder public/foto_import
        // if (!empty($row['foto'])) {
        //     $sourcePath = public_path('foto_import/' . $row['foto']);
        //     if (file_exists($sourcePath)) {
        //         // Buat nama unik untuk simpan
        //         $namaFileBaru = time() . '_' . $row['foto'];
        //         copy($sourcePath, public_path('foto/' . $namaFileBaru));

        //         $siswa->foto = $namaFileBaru;
        //     }
        // }

        // Generate QR Code jika belum ada
        if (!$siswa->qrcode) {
            $payload = $siswa->NISN . ' - ' . $siswa->NamaSiswa;
            $qr = base64_encode(QrCode::format('png')->size(200)->generate($payload));
            $siswa->qrcode = $qr;
        }

        $siswa->save();

        return $siswa;
    }

    public function headingRow(): int
    {
        return 1; // Header ada di baris 1
    }
}
