<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id_buku');
            $table->unsignedInteger('id_kategori');
            $table->string('kode_buku');
            $table->string('judul');
            $table->string('pengarang');
            $table->year('tahun_terbit');
            $table->string('penerbit');
            $table->string('isbn');
            $table->integer('stok');
            $table->string('lokasi');
            $table->string('sinopsis');
            $table->enum('asal', ['pembelian', 'sumbangan', 'denda']);
            $table->string('gambar');
            $table->timestamps();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
