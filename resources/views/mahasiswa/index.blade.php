@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Dosen Pembimbing</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->nim }}</td>
                <td>{{ $data->dosen->nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('mahasiswa.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('mahasiswa.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $data->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection