@extends('layouts.app')

@section('content')
<h2>Edit Pegawai</h2>

<form method="POST" action="{{ route('employees.update', $employee) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nomor</label>
        <input type="text" name="nomor" value="{{ $employee->nomor }}" class="form-control" disabled>
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $employee->nama }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" value="{{ $employee->jabatan }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="talahir" value="{{ $employee->talahir }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Foto Baru (optional)</label>
        <input type="file" name="photo" class="form-control">
        @if($employee->photo_upload_path)
            <img src="{{ $employee->photo_upload_path }}" width="80" class="mt-2">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection