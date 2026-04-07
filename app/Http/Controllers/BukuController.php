<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role !=='admin'){
            abort(403,'maaf anda bukan admin');
        }
        $semuabuku=buku::all();
        return view('buku.index',compact('semuabuku'));
    }
    public function halamansiswa()
    {
        $semuabuku=buku::all();
        return view('siswa',compact('semuabuku'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         if (auth()->user()->role !=='admin'){
            abort(403,'maaf anda bukan admin');
        }
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
public function store(Request $request, buku $buku)
    {
        if (auth()->user()->role !=='admin'){
            abort(403,'maaf anda bukan admin'); //buat mendandakan jika hanya admin yang boleh masuk ,jika tidak maka akan terjadi forbidden
        }
        $request->validate([
            'judul'=>'required',
            'penulis'=>'required',
            'stok'=>'required|numeric', //buat memvalidasi apa yg didalam model
        ]);
        $buku->create($request->all()); //buat  mengirim printah dri model lalu dibuat dalam sbuah data conto0h buku->create
        return redirect()->route('buku.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku)
    {
        if (auth()->user()->role !=='admin'){
            abort(403,'maaf anda bukan admin');
        }
        return view('buku.edit',compact('buku'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buku $buku)
    {
        if (auth()->user()->role !=='admin'){
            abort(403,'maaf anda bukan admin');
        }
        $request->validate([
            'judul'=>'required',
            'penulis'=>'required',
            'stok'=>'required|numeric',
        ]);
        $buku->update($request->all()); // mmengambil data lalu di update dengan semua
        return redirect()->route('buku.index'); //kembali ke buku.index

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
    {
        if (auth()->user()->role !=='admin'){
            abort(403,'maaf anda bukan admin');
        }
        $buku->delete(); //menghapus data
        return redirect()->route('buku.index');
    }
}
