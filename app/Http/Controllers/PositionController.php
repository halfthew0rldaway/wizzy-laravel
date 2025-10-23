<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    // Tampilkan semua data jabatan
    public function index()
    {
        $positions = Position::all();
        return view('backend.positions.index', compact('positions'));
    }

    // Form tambah data
    public function create()
    {
        return view('backend.positions.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        Position::create($request->all());

        return redirect()->route('position')->with('success', 'Data jabatan berhasil ditambahkan.');
    }

    // Hapus data
    public function delete($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('position')->with('success', 'Data jabatan berhasil dihapus.');
    }
}