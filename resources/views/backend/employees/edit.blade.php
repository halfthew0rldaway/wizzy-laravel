@extends('backend.dashboard.index')

@section('title', 'Edit Pegawai')

@section('content')
<div class="container">
    <h2>Edit Pegawai</h2>
    <form action="{{ route('emp_update', $employee->id_emp) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Jabatan</label>
            <select name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror" required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach($positions as $pos)
                    <option value="{{ $pos->position_id }}" {{ old('jabatan_id', $employee->jabatan_id) == $pos->position_id ? 'selected' : '' }}>{{ $pos->nama_jabatan }}</option>
                @endforeach
            </select>
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

        <!-- Photo upload preview + input -->
        <div class="mb-3">
            <label>Foto</label>
            @php $img = old('img', $employee->img); @endphp
            @if(!empty($img))
                <div class="mb-2">
                    <img src="{{ asset('image/' . $img) }}" alt="Foto {{ $employee->nama }}" style="max-width:150px; max-height:150px; object-fit:cover;" />
                </div>
            @endif
            <input type="file" name="img" accept="image/*" class="form-control @error('img') is-invalid @enderror">
            @error('img')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('emp') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection