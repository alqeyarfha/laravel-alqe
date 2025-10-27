<?php
namespace App\Models;

// app/Models/Biodata.php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
class Biodata extends Model
{
    protected $table = 'biodata'; // atau 'biodatas', sesuai nama tabel kamu

    protected $fillable = [
        'nama',
        'tgl_lahir',
        'jk',
        'agama',
        'alamat',
        'tinggi_badan',
        'berat_badan',
        'foto',
    ];

    // Konversi otomatis ke Carbon
    protected $casts = [
        'tgl_lahir' => 'date',
    ];
}
