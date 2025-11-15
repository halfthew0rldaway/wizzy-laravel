<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Position;

class EmployeeController extends Controller
{
    public function index()
    {
        $emp = Employee::all();
        return view('backend.employees.index', compact('emp'));
    }

    public function create()
    {
        $positions = Position::all();

        return view('backend.employees.create', compact('positions'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'jabatan_id' => 'required',
            'nama'       => 'required|string|max:255',
            'email'      => 'required|email|unique:employees,email',
            'alamat'     => 'nullable|string',
            'img'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'jabatan_id' => $request->jabatan_id,
            'nama'       => $request->nama,
            'email'      => $request->email,
            'alamat'     => $request->alamat,
        ];

        // Upload foto jika ada
        if ($request->hasFile('img')) {
            $file = $request->file('img');
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
        $positions = \App\Models\Position::all();
        return view('backend.employees.edit', compact('employee', 'positions'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'email'      => 'required|email|unique:employees,email,' . $id . ',id_emp',
            'alamat'     => 'nullable|string',
            'jabatan_id' => 'required|string',
            'img'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employee = Employee::findOrFail($id);

        $data = [
            'nama'       => $request->nama,
            'email'      => $request->email,
            'alamat'     => $request->alamat,
            'jabatan_id' => $request->jabatan_id,
        ];

        // Upload foto baru jika ada
        if ($request->hasFile('img')) {
            // Hapus foto lama jika ada
            if ($employee->img && file_exists(public_path('image/' . $employee->img))) {
                @unlink(public_path('image/' . $employee->img));
            }
            $file = $request->file('img');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $namaFile);

            $data['img'] = $namaFile;
        }

        $employee->update($data);

        return redirect()->route('emp')->with('success', 'Data pegawai berhasil diperbarui.');
    }
}
