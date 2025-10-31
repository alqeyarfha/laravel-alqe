@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Pelanggan</h2>

    <table class="table table-striped">
        <tr><th>ID</th><td>{{ $pelanggan->id }}</td></tr>
        <tr><th>Nama</th><td>{{ $pelanggan->nama }}</td></tr>
        <tr><th>Alamat</th><td>{{ $pelanggan->alamat }}</td></tr>
        <tr><th>No HP</th><td>{{ $pelanggan->no_hp }}</td></tr>
    </table>

    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
