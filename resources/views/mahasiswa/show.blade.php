@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Detail Mahasiswa</div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
            <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
            <p><strong>Dosen Pembimbing:</strong> {{ $mahasiswa->dosen->nama ?? '-' }}</p>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection