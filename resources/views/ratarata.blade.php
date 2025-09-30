<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h2>Daftar Nilai Siswa</h2>
    <ul>
        @php $total = 0; @endphp
        @foreach ($siswa as $item)
            <li>{{ $item['nama'] }}: {{ $item['nilai'] }}</li>
            @php $total += $item['nilai']; @endphp
        @endforeach
    </ul>
    @php $rata2 = $total / count($siswa); @endphp
    <p>Rata-rata Kelas: {{ number_format($rata2, 2) }}</p>
    <p>Status Kelas: 
        @if ($rata2 >= 75)
            Lulus
        @else
            Remedial
        @endif
    </p>

</body>
</html>