<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Akses;



//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user= User::with('akses')->get();
        return view('pages/Data User/DaftarUser',compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $akses = Akses::get(); 
        return view('pages/Data User/EditUser', compact('user','akses'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'id_akses' =>'required'
        ]);

       // update tabel walikel
            $user->update([
                'email' => $request->email,
                'password' => $request->password,
                'id_akses' => $request->id_akses,
            ]);
            return redirect()->route('user.index')->with('message', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
         $user->delete();
        return redirect()->route('user.index')->with('message', 'Data kelas berhasil dihapus.');
    }
}
