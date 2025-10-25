@extends('backend.dashboard.index')

@section('title', 'Edit Pegawai')

@section('content')
<div class="container">
    <h2>Edit Pegawai</h2>
    <form action="{{ route('emp_update', $employee->id_emp) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Jabatan ID</label>
            <input type="text" name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror" 
                   value="{{ old('jabatan_id', $employee->jabatan_id) }}" required>
            @error('jabatan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                   value="{{ old('nama', $employee->nama) }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email', $employee->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $employee->alamat) }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('emp') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection