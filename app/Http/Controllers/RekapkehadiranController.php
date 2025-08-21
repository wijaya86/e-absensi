<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
//import return type View
use Illuminate\View\View;
use Carbon\Carbon;
//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
class RekapkehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index(Request $request)
    {
        $bulan = $request->get('bulan', now()->month);
        $tahun = $request->get('tahun', now()->year);
        $kelasFilter = $request->get('kelas', 'all');

        // Ambil daftar kelas untuk filter
        $kelas = Kelasi::all();

        $query = DB::table('absensis')
            ->join('siswas', 'siswas.NISN', '=', 'absensis.NISN')
            ->join('kelasis', 'kelasis.id', '=', 'siswas.id_Kelas')
            ->leftJoin('kehadirans', 'kehadirans.id', '=', 'absensis.id_Kehadiran')
            ->select(
                'siswas.NISN',
                'siswas.NamaSiswa',
                'kelasis.NamaKelas',
                DB::raw('COUNT(*) as total'),
                DB::raw("SUM(CASE WHEN kehadirans.kehadiran = 'Hadir' THEN 1 ELSE 0 END) as hadir"),
                DB::raw("SUM(CASE WHEN kehadirans.kehadiran = 'Sakit' THEN 1 ELSE 0 END) as sakit"),
                DB::raw("SUM(CASE WHEN kehadirans.kehadiran IN ('Izin','Ijin') THEN 1 ELSE 0 END) as izin"),
                DB::raw("SUM(CASE WHEN kehadirans.kehadiran IN ('Alpa','Alpha','Tanpa Keterangan') THEN 1 ELSE 0 END) as alpa")
            )
            ->whereMonth('absensis.tanggal', $bulan)
            ->whereYear('absensis.tanggal', $tahun);

        if ($kelasFilter != 'all') {
            $query->where('kelasis.id', $kelasFilter);
        }

        $query->groupBy('siswas.NISN', 'siswas.NamaSiswa', 'kelasis.NamaKelas')
            ->orderBy('kelasis.NamaKelas', 'asc');

        // kalau tidak ada data, jadikan collection kosong biar tidak null
        $perKelas = $query->get() ?? collect();

        return view('pages/Rekapitulasi/Rekapkehadiran', compact('perKelas','bulan','tahun','kelas'));
            

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
            $bulan       = (int) $request->get('bulan', now()->month);
    $tahun       = (int) $request->get('tahun', now()->year);
    $kelasFilter = $request->get('kelas', 'all');

    $kelas = Kelasi::orderBy('NamaKelas')->get();

    $query = DB::table('absensis')
        ->join('siswas', 'siswas.NISN', '=', 'absensis.NISN')
        ->join('kelasis', 'kelasis.id', '=', 'siswas.id_Kelas')
        ->leftJoin('kehadirans', 'kehadirans.id', '=', 'absensis.id_Kehadiran')
        ->whereMonth('absensis.tanggal', $bulan)
        ->whereYear('absensis.tanggal', $tahun)
        ->select(
            'siswas.NISN',
            'siswas.NamaSiswa',
            'kelasis.NamaKelas',
            DB::raw('COUNT(*) as total'),
            DB::raw("SUM(CASE WHEN COALESCE(kehadirans.Kehadiran, absensis.id_Kehadiran) = 'Hadir' THEN 1 ELSE 0 END) as hadir"),
            DB::raw("SUM(CASE WHEN COALESCE(kehadirans.Kehadiran, absensis.id_Kehadiran) = 'Sakit' THEN 1 ELSE 0 END) as sakit"),
            DB::raw("SUM(CASE WHEN COALESCE(kehadirans.Kehadiran, absensis.id_Kehadiran) IN ('Izin','Ijin') THEN 1 ELSE 0 END) as izin"),
            DB::raw("SUM(CASE WHEN COALESCE(kehadirans.Kehadiran, absensis.id_Kehadiran) IN ('Alpa','Alpha','Tanpa Keterangan') THEN 1 ELSE 0 END) as alpa")
        );

            if ($kelasFilter !== 'all') {
                $query->where('kelasis.id', $kelasFilter);
            }

            $perKelas = $query
                ->groupBy('siswas.NISN', 'siswas.NamaSiswa', 'kelasis.NamaKelas')
                ->orderBy('kelasis.NamaKelas', 'asc')
                ->get();

            $kelasTerpilih = $kelasFilter === 'all'
                ? 'Semua Kelas'
                : optional($kelas->firstWhere('id', $kelasFilter))->NamaKelas;

            $pdf = Pdf::loadView('pages/Rekapitulasi/RekapKehadiranpdf', compact(
                    'perKelas','bulan','tahun','kelas','kelasFilter','kelasTerpilih'
                ))
                ->setPaper('a4', 'landscape');

            return $pdf->download("Rekap_AbsensiKehadiran_{$bulan}_{$tahun}.pdf");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
