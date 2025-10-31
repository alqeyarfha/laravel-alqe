@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pelanggan</h1>

    <p><strong>ID:</strong> {{ $pelanggan->id }}</p>
    <p><strong>Nama:</strong> {{ $pelanggan->nama }}</p>
    <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
    <p><strong>No HP:</strong> {{ $pelanggan->no_hp }}</p>

    <a href="{{ route('pelanggan.index') }}">Kembali ke daftar</a>
</div>
@endsection
