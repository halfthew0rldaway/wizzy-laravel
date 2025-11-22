@extends('backend.dashboard.index')

@section('title', 'Payroll')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">Data Payroll</h4>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Pegawai</th>
                    <th>Jabatan</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($emp as $row)
                <tr>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->position->nama_jabatan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('payroll_create', $row->id_emp) }}" class="btn btn-success btn-sm">+ Buat Payroll</a>
                        <a href="" class="btn btn-primary btn-sm">Lihat Payroll</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Tidak ada data payroll.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection