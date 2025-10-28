<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('mahasiswa_hobi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('cascade');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_hobi');
    }
};
