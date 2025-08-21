<?php

namespace App\Http\Controllers;

use App\Imports\WalikelImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Endroid\QrCode\Builder\Builder;
use Illuminate\Support\Facades\File;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalikelImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        Excel::import(new WalikelImport, $request->file('file'));

        return redirect()
            ->route('walikel.index')
            ->with('success', 'Import Data berhasil!');
    
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Walikel $walikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Walikel $walikel)
    {
        //
    }
}
