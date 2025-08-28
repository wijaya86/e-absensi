<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
// use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = DB::table('absensis')
                ->join('kehadirans', 'absensis.id_Kehadiran', '=', 'kehadirans.id')
                ->join('siswas', 'absensis.NISN', '=', 'siswas.NISN')
                ->join('kelasis', 'siswas.id_Kelas', '=', 'kelasis.id')
                ->select('absensis.id','absensis.tanggal', 'siswas.NISN', 'siswas.NamaSiswa', 'siswas.Jenkel',
                        'kelasis.NamaKelas', 'kehadirans.kehadiran')
                ->orderBy('absensis.tanggal', 'asc');
                $rekap = $query->get();
                return view('pages/Data Absensi/DaftarAbsensi',compact('rekap'));
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
         
        $request->validate([
           'NISN'         => 'required',
           'tanggal'         => 'required',
           'id_Kehadiran'     => 'required'
        ]);

         Absensi::create([
           'NISN'         => $request->NISN,
           'tanggal'         => $request->tanggal,
            'id_Kehadiran'         => $request->id_Kehadiran
        ]);

         return redirect()->route('rekap.index')
            ->with('message','Product created successfully.');
       

    }

    /**
     * Display the specified resource.
     */
    public function autocomplete(Request $request)
    {
        $term = $request->get('term', '');

            $siswas = \App\Models\Siswa::where('NamaSiswa', 'LIKE', '%' . $term . '%')
                ->orWhere('NISN', 'LIKE', '%' . $term . '%')
                ->limit(10) // biar nggak terlalu banyak
                ->get();

            $data = [];
            foreach ($siswas as $siswa) {
                $data[] = [
                    'label' => $siswa->NamaSiswa . ' (' . $siswa->NISN . ')',
                    'value' => $siswa->NISN,
                ];
    }

    return response()->json($data);
    }

    public function show(Request $request)
    {
       
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
