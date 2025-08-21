<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Kelasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
{
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));
        $kelasId = $request->input('kelas', 'all');

            $data = DB::table('absensis')
            ->join('kehadirans', 'absensis.id_Kehadiran', '=', 'kehadirans.id')
            ->join('siswas', 'absensis.NISN', '=', 'siswas.NISN')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->when($kelasId != 'all', function($query) use ($kelasId) {
                $query->where('siswas.id_Kelas', $kelasId);
            })
            ->select('kehadirans.kehadiran as status', DB::raw('count(*) as total'))
            ->groupBy('kehadirans.kehadiran')
            ->pluck('total','status');

        $kelasList = Kelasi::all();

        return view('pages.Rekapitulasi.chart_kelas', compact('data', 'bulan', 'tahun', 'kelasId', 'kelasList'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelasi $kelasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelasi $kelasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelasi $kelasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelasi $kelasi)
    {
        //
    }
}
