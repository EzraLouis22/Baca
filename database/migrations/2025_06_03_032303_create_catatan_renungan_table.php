<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatanRenunganTable extends Migration
{
    public function up()
    {
        Schema::create('catatan_renungan', function (Blueprint $table) {
            $table->id();
            $table->string('prinsip');
            $table->enum('penerapan', ['Penerapan 1', 'Penerapan 2', 'Penerapan 3']);
            $table->unsignedBigInteger('renungan_id')->nullable();
            $table->foreign('renungan_id')
                  ->references('id')
                  ->on('renungans')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catatan_renungan');
    }
}