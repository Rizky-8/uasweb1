<?php
namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    // Menampilkan daftar transaksi
    public function indexTransaksi()
    {
        $transaksis = Transaksi::all();
        return view('transaksi.index', compact('transaksis'));
    }
}