<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    
    public function index(request $request){
        $cari = $request->query('cari');
        $buku = buku::where('judul','like',"%$cari%")
        -orWhere('kategori','like',"%cari%")->get();
        return view('siswa.katalog',compact('buku'));
    }
}
