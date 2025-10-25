@extends('backend.dashboard.index')

@section('title', 'Data Jabatan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Data Jabatan</h4>
        <a href="{{ route('position_create') }}" class="btn btn-primary btn-sm">+ Tambah Jabatan</a>
    </div>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body">
            {{-- Form Search --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <form action="{{ route('position') }}" method="GET" class="d-flex gap-2">
                        <input type="text" 
                               name="search" 
                               class="form-control" 
                               placeholder="Cari berdasarkan Nama Jabatan atau Gaji..." 
                               value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        @if(request('search'))
                            <a href="{{ route('position') }}" class="btn btn-secondary">Reset</a>
                        @endif
                    </form>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-muted">
                        Menampilkan {{ $p->count() }} data
                        @if(request('search'))
                            dari pencarian "<strong>{{ request('search') }}</strong>"
                        @endif
                    </small>
                </div>
            </div>

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Position ID</th>
                            <th>Nama Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($p as $position)
                            <tr>
                                <td>{{ $position->position_id }}</td>
                                <td>
                                    @if(request('search'))
                                        {!! str_ireplace(request('search'), '<mark>' . request('search') . '</mark>', $position->nama_jabatan) !!}
                                    @else
                                        {{ $position->nama_jabatan }}
                                    @endif
                                </td>
                                <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('position_edit', $position->position_id) }}" 
                                       class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('position_delete', $position->position_id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    @if(request('search'))
                                        <div class="text-muted">
                                            <p class="mt-2">Tidak ada data yang sesuai dengan "<strong>{{ request('search') }}</strong>"</p>
                                            <a href="{{ route('position') }}" class="btn btn-sm btn-primary">Lihat Semua Data</a>
                                        </div>
                                    @else
                                        <div class="text-muted">
                                            <p class="mt-2">Belum ada data jabatan</p>
                                            <a href="{{ route('position_create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection