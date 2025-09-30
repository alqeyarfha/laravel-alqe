<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// basic
Route :: get('about', function(){
    return '<h1>Hallo</h1>'.
    '<br> Selamat datang di perpustakaan digital';
});

Route :: get('perkenalan', function(){
    return '<h1>Hallo</h1>'.
    '<br>Nama: alqe'.
    '<br>sekolah: SMK ASSALLAAM Bandung'.
    '<br>kelas:XI'.
    '<br>jurusan: RPL';
});

Route :: get('buku', function(){
    return view ('buku');
});

route ::get('menu', function(){
       $data = [
        ['nama_makanan'=>'bala-bala','harga'=>1000,'jumlah'=>10],
        ['nama_makanan'=>'gehu pedas','harga'=>2000,'jumlah'=>15],
        ['nama_makanan'=>'cireng isi ayam','harga'=> 2500,'jumlah'=> 5],

       ];

       $resto = "Resto MPL - Makanan penuh lemak";
       
       return view ('menu',compact('data', 'resto'));
    });

route ::get('books/{judul}', function($a){
   return 'judul Buku : ' . $a;
});

route::get('post/{title}/{category}',function($a, $b){
    return view('post',['judul'=>$a, 'cat' =>$b]);
});

route::get('profile/{nama?}', function($a = "guest"){
    return 'halo nama saya ' .$a;
});

route::get('order/{item}', function($a = "nasi"){
    return view('order', compact('a'));
});

route ::get('alat', function(){
       $data = [
        ['nama_barang'=>'buku','harga'=>15000,'jumlah'=>2],
        ['nama_barang'=>'pensil','harga'=>3000,'jumlah'=>5],
        ['nama_barang'=>'penggaris isi ayam','harga'=> 7000,'jumlah'=> 1],

       ];

       $alat = "Toko Alat tulis - ,murah dan lengkap";
       
       return view ('alat',compact('data', 'alat'));
    });


route::get('nilai/{nama}/{mapel}/{nilai}', function ($a, $b, $c) {
    return view('nilai', ['nama' => $a, 'mapel' => $b, 'nilai' =>$c]);
});


route::get('grading/{nama?}/{nilai?}', function ($a = "guest", $b = 0) {
    return view('grading', ['nama' => $a, 'nilai' => $b]);
});

Route::get('ratarata', function () {
    $siswa = [
        ['nama' => 'asep', 'nilai' => 85],
        ['nama' => 'mono', 'nilai' => 70],
        ['nama' => 'gimen', 'nilai' => 95],
    ];
    return view('ratarata', compact('siswa'));
});

