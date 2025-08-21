<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $siswas =Siswa::with('kelasi')->get();
        return view('pages/Data Siswa/Card',compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::with('kelasi')->get();

             $siswas = Siswa::with('kelasi')->get();

            $pdf = \PDF::loadView('pages/Data Siswa/Cardpdf', compact('siswas'))
                ->setPaper('a4', 'portrait');

            return $pdf->download('Kartu_Absensi_Siswa.pdf');
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
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
