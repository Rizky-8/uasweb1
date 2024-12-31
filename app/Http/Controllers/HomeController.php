<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan untuk mengimpor model User

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all(); // Mengambil semua pengguna dari database
        return view('home', compact('users')); // Mengirim data pengguna ke view
    }
    
}