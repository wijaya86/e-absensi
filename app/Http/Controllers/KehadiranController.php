<?php

namespace App\Http\Controllers;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

use App\Models\Kehadiran;

use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        //get all products
        $kehadiran = Kehadiran::latest()->paginate(10);
        return view('pages/Data Kehadiran/DaftarKehadiran',compact('kehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        return view('pages/Data Kehadiran/DataKehadiran');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
       $request->validate([
           'kehadiran'         => 'required'
        ]);

         Kehadiran::create([
           'kehadiran'         => $request->kehadiran
        ]);

         return redirect()->route('kehadiran.index')
            ->with('message','Product created successfully.');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kehadiran $kehadiran)
    {
        return view('pages/Data Kehadiran/EditKehadiran',compact('kehadiran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kehadiran $kehadiran)
    {
        $request->validate([
            'kehadiran' => 'required'           
        ]);

        $kehadiran->update($request->all());
        return redirect()->route('kehadiran.index')->with('message', 'Data kehadiran berhasil diperbarui.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kehadiran $kehadiran)
    {
         $kehadiran->delete();
        return redirect()->route('kehadiran.index')->with('message', 'Data kehadiran berhasil dihapus.');
    }
}
