<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\SukuCadang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transaksis = Transaksi::with('sukuCadang')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    // Menampilkan form untuk menambahkan transaksi baru
    public function create()
    {
        $sukuCadangs = SukuCadang::all();
        return view('transaksi.create', compact('sukuCadangs'));
    }

    // Menyimpan transaksi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'suku_cadang_id' => 'required|exists:suku_cadangs,id', // Pastikan nama tabel sesuai
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
        ]);

        Transaksi::create($request->only('suku_cadang_id', 'jumlah', 'total_harga')); // Hanya ambil field yang diperlukan
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit transaksi
    public function edit(Transaksi $transaksi)
    {
        $sukuCadangs = SukuCadang::all();
        return view('transaksi.edit', compact('transaksi', 'sukuCadangs'));
    }

    // Memperbarui transaksi yang ada
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'suku_cadang_id' => 'required|exists:suku_cadangs,id', // Pastikan nama tabel sesuai
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
        ]);

        $transaksi->update($request->only('suku_cadang_id', 'jumlah', 'total_harga')); // Hanya ambil field yang diperlukan
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Menghapus transaksi
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}