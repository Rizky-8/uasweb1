<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    // Menampilkan daftar pemasok
    public function index()
    {
        $pemasoks = Pemasok::all();
        return view('pemasok.index', compact('pemasoks'));
    }

    // Menampilkan form untuk menambahkan pemasok baru
    public function create()
    {
        return view('pemasok.create');
    }

    // Menyimpan pemasok baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        Pemasok::create($request->only('nama', 'alamat')); // Hanya ambil 'nama' dan 'alamat' untuk keamanan
        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit pemasok
    public function edit(Pemasok $pemasok)
    {
        return view('pemasok.edit', compact('pemasok'));
    }

    // Memperbarui pemasok yang ada
    public function update(Request $request, Pemasok $pemasok)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $pemasok->update($request->only('nama', 'alamat')); // Hanya ambil 'nama' dan 'alamat' untuk keamanan
        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil diperbarui.');
    }

    // Menghapus pemasok
    public function destroy(Pemasok $pemasok)
    {
        $pemasok->delete();
        return redirect()->route('pemasok.index')->with('success', 'Pemasok berhasil dihapus.');
    }
}