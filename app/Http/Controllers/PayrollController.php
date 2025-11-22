<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\PayrollDetail;

class PayrollController extends Controller
{
    public function index()
    {
        $emp = Employee::with('position')->get();
        return view('backend.payroll.index', compact('emp'));
    }

    public function create($id)
    {
        $emp = Employee::with('position')->findOrFail($id);
        return view('backend.payroll.create', compact('emp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'emp_id'      => 'required',
            'bulan'       => 'required',
            'total_gaji'  => 'required',
            'jenis'       => 'required|array',
            'jumlah'      => 'required|array',
            'keterangan'  => 'array'
        ]);

        $payroll = Payroll::create([
            'id_emp'     => $request->emp_id,
            'bulan'      => $request->bulan,
            'total_gaji' => $request->total_gaji,
        ]);

        foreach ($request->jenis as $i => $jenis) {
            PayrollDetail::create([
                'payroll_id'  => $payroll->id,
                'jenis'       => $jenis,
                'keterangan'  => $request->keterangan[$i] ?? null,
                'jumlah'      => $request->jumlah[$i],
            ]);
        }

        return redirect()->route('payroll')->with('success', 'Payroll Berhasil dibuat!');
    }
}