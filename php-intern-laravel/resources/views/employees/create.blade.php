@extends('layouts.app')

@section('content')
<h2>Tambah Pegawai</h2>

<form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Nomor</label>
        <input type="text" name="nomor" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control">
    </div>
    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="talahir" class="form-control">
    </div>
    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
