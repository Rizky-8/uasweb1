<?php
namespace App\Http\Controllers;

use App\Models\SukuCadang;
use App\Models\Kategori;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan daftar suku cadang
    public function indexSukuCadang()
    {
        $sukuCadangs = SukuCadang::all();
        return view('suku_cadang.index', compact('sukuCadangs'));
    }

    // Menampilkan daftar kategori
    public function indexKategori()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    // Menampilkan daftar pemasok
    public function indexPemasok()
    {
        $pemasoks = Pemasok::all();
        return view('pemasok.index', compact('pemasoks'));
    }
}