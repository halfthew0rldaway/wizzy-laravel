@extends('backend.dashboard.index')

@section('title', 'Tambah Jabatan')

@section('content')
<div class="container">
    <h2>Tambah Jabatan</h2>
    <form action="{{ route('position_store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control @error('nama_jabatan') is-invalid @enderror" 
                   value="{{ old('nama_jabatan') }}" required>
            @error('nama_jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Gaji Pokok</label>
            <input type="number" name="gaji_pokok" class="form-control @error('gaji_pokok') is-invalid @enderror" 
                   value="{{ old('gaji_pokok') }}" step="0.01" required>
            @error('gaji_pokok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('position') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection