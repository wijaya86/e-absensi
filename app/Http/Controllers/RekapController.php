<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//import return type View
use Illuminate\View\View;
use Carbon\Carbon;
//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index(Request $request)
    {
             $bulan = $request->get('bulan', date('m')); // default bulan sekarang
            $tahun = $request->get('tahun', date('Y')); // default tahun sekarang
            $kelas = $request->get('kelas');

            $query = DB::table('absensis')
                ->join('kehadirans', 'absensis.id_Kehadiran', '=', 'kehadirans.id')
                ->join('siswas', 'absensis.NISN', '=', 'siswas.NISN')
                ->join('kelasis', 'siswas.id_Kelas', '=', 'kelasis.id')
                ->select('absensis.tanggal', 'siswas.NISN', 'siswas.NamaSiswa', 'siswas.Jenkel',
                        'kelasis.NamaKelas', 'kehadirans.kehadiran')
                ->whereMonth('absensis.tanggal', $bulan)
                ->whereYear('absensis.tanggal', $tahun)
                ->orderBy('absensis.tanggal', 'asc');

            if ($kelas) {
                $query->where('kelasis.id', $kelas);
            }

            $rekap = $query->get();
            $kelas = DB::table('kelasis')->get();
                return view('pages/Rekapitulasi/Rekap',compact('rekap','kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
                   $bulan = (int) $request->get('bulan', \Carbon\Carbon::now()->month);
                    $tahun = (int) $request->get('tahun', \Carbon\Carbon::now()->year);
                    $kelas = $request->get('kelas');

                    $query = DB::table('absensis')
                        ->join('kehadirans', 'absensis.id_Kehadiran', '=', 'kehadirans.id')
                        ->join('siswas', 'absensis.NISN', '=', 'siswas.NISN')
                        ->join('kelasis', 'siswas.id_Kelas', '=', 'kelasis.id')
                        ->select('absensis.tanggal', 'siswas.NISN', 'siswas.NamaSiswa',
                                'siswas.Jenkel','kelasis.NamaKelas', 'kehadirans.kehadiran')
                        ->whereMonth('absensis.tanggal', $bulan)
                        ->whereYear('absensis.tanggal', $tahun)
                        ->orderBy('absensis.tanggal', 'asc');

                    if ($kelas) {
                        $query->where('kelasis.id', $kelas);
                    }

                    $rekap = $query->get();


                        $pdf = Pdf::loadView('pages/Rekapitulasi/Rekappdf', compact('rekap','bulan','tahun','kelas'))
                    ->setPaper('a4', 'portrait');

                return $pdf->download("rekap_absensi_{$bulan}_{$tahun}.pdf");
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
