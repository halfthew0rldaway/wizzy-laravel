<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    // Tampilkan semua data jabatan
    public function index(Request $request)
    {
        $positions = Position::all();
        $search =$request->input('search');
        $query = Position::query();

        if(!empty($search))
        {
        $query->where('nama_jabatan', 'like',  '%'.$search.'%')->orWhere('gaji_pokok', 'like', '%'.$search.'%');
        }
        $p = $query->orderBy('nama_jabatan','asc')->get();

        return view('backend.positions.index', compact('p'));
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

    // Form edit data
    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('backend.positions.edit', compact('position'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        $position = Position::findOrFail($id);
        $position->update([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect()->route('position')->with('success', 'Data jabatan berhasil diperbarui.');
    }

    // Hapus data
    public function delete($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('position')->with('success', 'Data jabatan berhasil dihapus.');
    }
}