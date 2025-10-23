@extends('backend.dashboard.index')

@section('title', 'Data Jabatan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Data Jabatan</h4>
        <a href="{{ route('position_create') }}" class="btn btn-primary btn-sm">+ Tambah Jabatan</a>
    </div>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Position ID</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($positions as $position)
                        <tr>
                            <td>{{ $position->position_id }}</td>
                            <td>{{ $position->nama_jabatan }}</td>
                            <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('position_delete', $position->position_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data jabatan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection