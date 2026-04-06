<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pinjam(request $request,$id){
        $buku = \App\Models\buku::findOrFail($id);
        if ($buku->stok<=0){
            return redirect()->back()->with('gagal','stok buku telah habis');
        }

        peminjaman::create([
            'user_id'=>auth()->id(),
            'buku_id'=>$id,
            'tanggal_pinjam'=>now(),
            'status'=>'pending',
        ]);
        return redirect()->back()->with('pending');
    }

    public function tolak($id){
        $pinjamans=peminjaman::findorfail($id);
        $pinjamans->update([
            'status'=>'ditolak',
        ]);
        return redirect()->back()->with('gagal','pinjaman ditolak admin');
    }

    public function setujui($id){
        $pinjamans=peminjaman::findorfail($id);
        $pinjamans->buku->decrement('stok');
        $pinjamans->update([
            'status'=>'dipinjam',
            'tanggal_pinjam'=>now(),
            'tanggal_kembali'=>now()->addDays(7),
        ]);
        return redirect()->back()->with('dipinjam');
    }
    public function kembali($id){
        $pinjamans=peminjaman::findorfail($id);
        $pinjamans->update([
            'status'=>'dikembalikan',
            'tanggal_kembali'=>now(),
        ]);
        $pinjamans->buku->increment('stok');
        return redirect()->back()->with('dikembalikan');
    }

    public function riwayat(){
        $pinjamans=peminjaman::with('buku')
        ->where('user_id',auth()->id())
        ->latest()
        ->get();
        return view('riwayat',compact('pinjamans'));
    }

    public function index()
    {
        $semuapinjaman=peminjaman::with(['user','buku'])->latest()->get();
        return view('admin.peminjaman',compact('semuapinjaman'));
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
    public function show(peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(peminjaman $peminjaman)
    {
        //
    }
}
