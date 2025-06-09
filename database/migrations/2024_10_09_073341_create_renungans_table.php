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
        Schema::create('renungans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('date_renungan');
            $table->string('bacaan');
            $table->text('ayat_bacaan');
            $table->string('ayat_kunci');
            $table->text('isi_renungan');
            $table->string('refleksi');
            $table->string('pertanyaan');
            $table->string('penerapan1');
            $table->string('penerapan2');
            $table->string('penerapan3');
            $table->string('prinsip');
            $table->string('doa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renungans');
    }
};
