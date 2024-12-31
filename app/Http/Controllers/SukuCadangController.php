<?php

namespace App\Http\Controllers;

use App\Models\SukuCadang; // Pastikan model ini ada
use Illuminate\Http\Request;

class SukuCadangController extends Controller
{
    /**
     * Menampilkan daftar suku cadang.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sukuCadangs = SukuCadang::all(); // Ambil semua data suku cadang
        return view('suku_cadang.index', compact('sukuCadangs'));
    }

    /**
     * Menampilkan form untuk membuat suku cadang baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('suku_cadang.create'); // Mengembalikan view untuk membuat suku cadang
    }

    /**
     * Menyimpan suku cadang baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Membuat suku cadang baru
        SukuCadang::create($request->all());

        return redirect()->route('suku_cadang.index')->with('success', 'Suku cadang berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit suku cadang yang ada.
     *
     * @param  \App\Models\SukuCadang  $sukuCadang
     * @return \Illuminate\View\View
     */
    public function edit(SukuCadang $sukuCadang)
    {
        return view('suku_cadang.edit', compact('sukuCadang')); // Mengembalikan view untuk mengedit suku cadang
    }

    /**
     * Memperbarui suku cadang yang ada di dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SukuCadang  $sukuCadang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, SukuCadang $sukuCadang)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Memperbarui suku cadang
        $sukuCadang->update($request->all());

        return redirect()->route('suku_cadang.index')->with('success', 'Suku cadang berhasil diperbarui.');
    }

    /**
     * Menghapus suku cadang dari database.
     *
     * @param  \App\Models\SukuCadang  $sukuCadang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SukuCadang $sukuCadang)
    {
        $sukuCadang->delete(); // Menghapus suku cadang

        return redirect()->route('suku_cadang.index')->with('success', 'Suku cadang berhasil dihapus.');
    }
}