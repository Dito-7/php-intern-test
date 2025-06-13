@extends('layouts.app')

@section('content')
<h2>Detail Pegawai</h2>

<div class="card">
    <div class="card-body">
        <p><strong>Nomor:</strong> {{ $employee->nomor }}</p>
        <p><strong>Nama:</strong> {{ $employee->nama }}</p>
        <p><strong>Jabatan:</strong> {{ $employee->jabatan }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $employee->talahir }}</p>
        <p><strong>Foto:</strong><br>
            @if($employee->photo_upload_path)
                <img src="{{ $employee->photo_upload_path }}" width="150">
            @else
                <em>Tidak ada foto</em>
            @endif
        </p>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
