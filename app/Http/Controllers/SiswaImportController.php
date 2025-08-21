<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Endroid\QrCode\Builder\Builder;
use Illuminate\Support\Facades\File;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SiswaImportController extends Controller
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
           $file = $request->file('file');

        // Baca file Excel
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
            Excel::import(new SiswaImport, $request->file('file'));
             return redirect()->route('siswa.index')->with('success', 'Import dan QR code berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SiswaImport $siswaImport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiswaImport $siswaImport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiswaImport $siswaImport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiswaImport $siswaImport)
    {
        //
    }
}
