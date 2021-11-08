<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('Kode',255);
            $table->string('Deskripsi',255);
            $table->date('Tanggal');
            $table->integer('Tanggal')->length(11);
            $table->foreign('Dompet_ID')->references('id')->on('dompet');
            $table->foreign('Kategori_ID')->references('id')->on('kategori');
            $table->foreign('Status_ID')->references('id')->on('transaksi_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
