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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('pendidikan');
            $table->enum('kategori_kepegawaian', ['Tenaga Pendidik', 'Tenaga Teknis']);
            $table->enum('status', ['PNS', 'honorer', 'kontrak']);
            $table->string('jabatan')->nullable();
            $table->text('gambar');
            $table->foreignId('id_sekolah')->constrained('sekolah')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};