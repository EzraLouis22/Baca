<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCatatanRenunganTable extends Migration
{
    public function up()
    {
        Schema::create('catatan_renungan', function (Blueprint $table) {
            $table->id();
            $table->string('prinsip');
            $table->enum('penerapan', ['Penerapan 1', 'Penerapan 2', 'Penerapan 3']); // Kolom penerapan menjadi enum
            $table->string('label')->default('');
            $table->unsignedBigInteger('renungan_id')->nullable();
            $table->foreign('renungan_id')->references('id')->on('renungan');
            $table->timestamps(); // Tambahkan kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('catatan_renungan');
    }
}