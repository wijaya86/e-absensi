<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kehadiran;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages/Data Absensi/scan');
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kehadiran = Kehadiran::get();
        return view('pages/Data Absensi/DataAbsensi',compact('kehadiran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $NISN = $request->input('NISN'); // dari QR code hasil scan
            $siswa = Siswa::where('NISN', $NISN)->first();

            if (!$siswa) {
                return back()->with('error', 'Siswa tidak ditemukan');
            }

            $today = Carbon::today();

            // Cek apakah sudah absen hari ini
            $sudahAbsen = Absensi::where('NISN', $siswa->NISN)
                            ->whereDate('tanggal', $today)
                            ->exists();

            if ($sudahAbsen) {
                return back()->with('message', 'Kamu sudah absen hari ini!');
            }

            Absensi::create([
                'NISN' => $siswa->NISN,
                'tanggal' => $today,
                'id_Kehadiran' => '1', // default
            ]);

            return back()->with('success', 'Absensi berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
