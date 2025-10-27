<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BiodataController;
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

// route::get('post/{title}/{category}',function($a, $b){
//     return view('post',['judul'=>$a, 'cat' =>$b]);
// });

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

Route::get('test-model',function(){
    $data = App\Models\Post::all();
    return $data;
});

Route::get('create-model', function (){
    $data = App\Models\Post::create([
    'title'=>'Ayam betina ',
    'content'=>'Lorem Ipsum',
    ]);
    return $data;
});

Route::get('show-data/{id}', function($id){
    $data = App\models\Post::find($id);
    return $data;
});

Route::get('edit-data/{id}', function($id) {
    $data = App\Models\Post::find($id);
    $data->title = "Membangunprojek dengan laravel";
    $data->save();
    return $data;
});

Route::get('delete-data/{data}', function($id){
    $data = App\Models\Post::find($id);
    $data->delete();
    return redirect('test-model');
}); 

Route::get('search/{cari}', function ($query){
    $data = App\Models\Post::where('title','like', '%' . $query . '%')->get();
    return $data;
});

Route::get('greetings', [mycontroller::class, 'hello']);
route::get('student', [MyController::class, 'siswa']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// post
Route::get('post',[PostController::class, 'index'])->name('post.index');

Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post', [PostController::class, 'store'])->name('post.store');

Route::get('post/{id}/edit', [PostController::class,'edit'])->name('post.edit');
Route::put('post/{id}', [PostController::class, 'update'])->name('post.update');

Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');

Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.delete');

Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');

Route::resource('dosen', App\Http\Controllers\DosenController::class)->middleware('auth');

Route::resource('hobi', App\Http\Controllers\HobiController::class)->middleware('auth');

// CROD One To Many
Roude::resouce('mahasiswa', App\Http\controller::MahasiswaController::class);