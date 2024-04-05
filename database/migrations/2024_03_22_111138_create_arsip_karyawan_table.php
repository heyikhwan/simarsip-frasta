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
            $table->integerIncrements('id_arsip_karyawan');
            $table->string('kode_arsip_karyawan', 20);
            $table->unsignedInteger('id_kategori_arsip')->nullable();
            $table->unsignedInteger('id_karyawan')->nullable();
            $table->unsignedInteger('id_departemen')->nullable();
            $table->string('retensi_arsip', 100);
            $table->text('file_arsip_karyawan')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('id_kategori_arsip')->references('id_kategori_arsip')->on('kategori_arsip')->constrained();
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan')->constrained();
            $table->foreign('id_departemen')->references('id_departemen')->on('departemen')->constrained();
            $table->foreign('user_id')->references('id_user')->on('users')->constrained();
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
