<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <center><h1>{{$alat}}</h1></center>
        @foreach ($data as $value)
        Nama:{{ $value['nama_barang'] }} <br>
        harga:{{ $value['harga'] }} <br>
        jumlah:{{ $value['jumlah'] }} <br>
        @php$total = $value['jumlah'] * $value['harga'];  @endphp
        <hr>
        <tr><td>Subtotal: {{$total}} <br> </td></tr>
        <tr>@if
        <td>Keterangan: get diskon 5% </td></tr>
        <tr>@else
            <td>keterangan</td>
        </tr>
        @endforeach
</body>
</html>