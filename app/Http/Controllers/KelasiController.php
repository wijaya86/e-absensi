<?php

namespace App\Http\Controllers;

use App\Models\Kelasi;
use Illuminate\Http\Request;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;


class KelasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          //get all products
        $kelas = Kelasi::latest()->paginate(10);
        return view('pages/Data Kelas/DaftarKelas',compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/Data Kelas/DataKelas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'NamaKelas'         => 'required',
           'Jurusan'         => 'required'
        ]);

         Kelasi::create([
           'NamaKelas'         => $request->NamaKelas,
           'Jurusan'         => $request->Jurusan
        ]);

         return redirect()->route('kelasi.index')
            ->with('success','Product created successfully.');
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
         return view('pages/Data Kelas/EditKelas', compact('kelasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelasi $kelasi)
    {
         $request->validate([
            'NamaKelas' => 'required',
            'Jurusan' => 'required'
        ]);

        $kelasi->update($request->all());
        return redirect()->route('kelasi.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelasi $kelasi)
    {
         $kelasi->delete();
        return redirect()->route('kelasi.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
