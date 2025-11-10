<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['kode_transaksi', 'tanggal', 'pelanggan_id', 'total_harga','jumlah'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, id_pelanggan);
    }
        public function produk()
    {
        return $this->belongsToMany(produk::class, 'detail_transaksi','id_transaksi', 'id_produk' )
        ->withPivot('jumlah', 'sub_total')
        ->withTimestamps();
    }
}
    