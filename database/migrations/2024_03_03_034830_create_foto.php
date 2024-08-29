<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id('foto_id');
            $table->string('lokasi_file');
            $table->string('judul_foto');
            $table->text('deskripsi');
            $table->timestamp('tgl_diunggah');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('album_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotos');
    }
};
