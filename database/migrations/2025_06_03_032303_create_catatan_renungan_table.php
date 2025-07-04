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
            $table->text('penerapan');
            $table->string('judul');
            $table->date('date_renungan');
            // Foreign key to the renungans table
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