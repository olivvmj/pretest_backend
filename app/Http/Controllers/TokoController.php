<?php

namespace App\Http\Controllers;

use App\Models\Toko; // Model Toko yang harus sudah dibuat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    /**
     * Menambahkan toko baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        // Buat toko baru
        $toko = new Toko();
        $toko->user_id = Auth::id();
        $toko->nama = $request->nama;
        $toko->alamat = $request->alamat;
        $toko->save();

        // Mengembalikan respons
        return response()->json([
            'message' => 'Toko berhasil ditambahkan!',
            'data' => $toko,
        ], 201);
    }
}
