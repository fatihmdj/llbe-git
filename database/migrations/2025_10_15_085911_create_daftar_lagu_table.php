<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daftar_lagu', function (Blueprint $table) {
            $table->id('id'); // Primary key
            $table->string('judul', 100);
            $table->string('artist', 100);
            $table->string('album', 100);
            $table->integer('durasi_menit');
            $table->string('tahun_rilis', 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daftar_lagu');
    }
};