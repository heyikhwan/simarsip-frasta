<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_karyawan', function (Blueprint $table) {
            $table->id('id_arsip_karyawan');
            $table->string('kode_arsip_karyawan', 20);
            $table->foreignId('id_kategori_arsip')->references('id_kategori_arsip')->on('kategori_arsip')->constrained();
            $table->foreignId('id_karyawan')->references('id_karyawan')->on('karyawan')->constrained();
            $table->foreignId('id_departemen')->references('id_departemen')->on('departemen')->constrained();
            $table->string('retensi_arsip', 100);
            $table->text('file_arsip_karyawan')->nullable();
            $table->foreignId('user_id')->references('id_user')->on('users')->constrained();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_karyawan');
    }
}
