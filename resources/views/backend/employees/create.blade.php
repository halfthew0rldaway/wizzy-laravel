@extends('backend.dashboard.index')

@section('title', 'Input Pegawai')

@section('content')
<div class="container">
    <h2>Tambah Pegawai</h2>
    <form action="{{ route('emp_store') }}" method="POST"enctype="multipart/form-data">>
        @csrf
        <div class="mb-3">
            <label>Jabatan ID</label>
            <input type="text" name="jabatan_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>foto</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
        
            @error('foto')
                <div class="text-danger small mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('emp') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection