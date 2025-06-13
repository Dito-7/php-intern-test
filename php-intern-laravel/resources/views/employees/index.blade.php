@extends('layouts.app')

@section('content')
<a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Tanggal Lahir</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $index => $employee)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $employee->nomor }}</td>
            <td>{{ $employee->nama }}</td>
            <td>{{ $employee->jabatan }}</td>
            <td>{{ $employee->talahir }}</td>
            <td>
                @if($employee->photo_upload_path)
                    <img src="{{ $employee->photo_upload_path }}" width="60">
                @endif
            </td>
            <td>
                <a href="{{ route('employees.show', $employee) }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
