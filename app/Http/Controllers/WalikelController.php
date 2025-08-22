<?php

namespace App\Http\Controllers;

use App\Models\Walikel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

//import encrypt password
use Illuminate\Support\Facades\Hash;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

use App\Models\Kelasi;
use App\Models\Akses;
class WalikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $walas= Walikel::with('kelasi')->get();
        return view('pages/Data Walikelas/DaftarWalas',compact('walas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         //get all products
         $kelas = Kelasi::get();
         $akses = Akses::get();
        return view('pages/Data Walikelas/DataWalas',compact('akses','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'NIP'              => 'required',
           'NamaGuru'         => 'required',
           'id_Kelas'         => 'required',
           'Email'            => 'required',
           'Password'         => 'required',
           'id_akses'         => 'required'
        ]);

         Walikel::create([
           'NIP'              => $request->NIP,
           'NamaGuru'         => $request->NamaGuru,
           'id_Kelas'         => $request->id_Kelas,
           
        ]);
         User::create([
           'name'            => $request->NamaGuru,
           'email'            => $request->Email,
           'password'         => Hash::make($request->Password),
           'NIP'              => $request->NIP,
           'id_akses'         => $request->id_akses
         ]);
         return redirect()->route('walikel.index')
            ->with('success','walas created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Walikel $walikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Walikel $walikel)
    {
         $kelas = Kelasi::get(); 
        return view('pages/Data WaliKelas/EditWalas', compact('walikel','kelas'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Walikel $walikel)
    {
          $request->validate([
            'NIP' => 'required',
            'NamaGuru' => 'required',
            'id_Kelas' =>'required'
        ]);

       // update tabel walikel
            $walikel->update([
                'NIP' => $request->NIP,
                'NamaGuru' => $request->NamaGuru,
                'id_Kelas' => $request->id_Kelas,
            ]);

            // update tabel user yg berelasi
            $user = User::where('NIP', $walikel->NIP)->firstOrFail();
            $user->update([
                'name' => $request->NamaGuru,
                'NIP'  => $request->NIP,
            ]);
        return redirect()->route('walikel.index')->with('success', 'Data kelas berhasil diperbarui.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Walikel $walikel)
    {
         $walikel->delete();
        return redirect()->route('walikel.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
