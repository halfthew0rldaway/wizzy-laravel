@extends('backend.dashboard.index')
@section('title', 'Data Pegawai')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Data Pegawai</h4>
        <a href="" class="btn btn-primary btn-sm">+ Tambah Pegawai</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Jabatan</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- You can loop employee data here --}}
                    @foreach($emp as $employee)
                        <tr>
                            <td>{{ $employee->id_emp }}</td>
                            <td>{{ $employee->nama }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->alamat }}</td>
                            <td>{{ $employee->jabatan_id }}</td>
                            <td>
                                {{-- Action buttons like edit/delete here --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
