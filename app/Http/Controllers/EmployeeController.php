<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $emp = Employee::all();
        return view('backend.employees.index', compact('emp'));
    }

    public function create()
    {
        return view('backend.employees.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'jabatan_id' => 'required',
            'nama'       => 'required|string|max:255',
            'email'      => 'required|email|unique:employees,email',
            'alamat'     => 'nullable|string',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'jabatan_id' => $request->jabatan_id,
            'nama'       => $request->nama,
            'email'      => $request->email,
            'alamat'     => $request->alamat,
        ];

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $namaFile);

            $data['img'] = $namaFile;
        }

        Employee::create($data);

        return redirect()->route('emp')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    // Hapus data
    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('emp')->with('success', 'Data pegawai berhasil dihapus.');
    }

    // Form edit data
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('backend.employees.edit', compact('employee'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'email'      => 'required|email|unique:employees,email,' . $id,
            'alamat'     => 'nullable|string',
            'jabatan_id' => 'required|string',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employee = Employee::findOrFail($id);

        $data = [
            'nama'       => $request->nama,
            'email'      => $request->email,
            'alamat'     => $request->alamat,
            'jabatan_id' => $request->jabatan_id,
        ];

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $namaFile);

            $data['foto'] = $namaFile;
        }

        $employee->update($data);

        return redirect()->route('emp')->with('success', 'Data pegawai berhasil diperbarui.');
    }
}
