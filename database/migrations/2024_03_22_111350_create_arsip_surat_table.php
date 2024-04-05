<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_surat', function (Blueprint $table) {
            $table->integerIncrements('id_arsip_surat');
            $table->string('kode_surat', 20);
            $table->date('tanggal_surat');
            $table->date('tanggal_diterima');
            $table->string('perihal', 100);
            $table->unsignedInteger('id_departemen')->nullable();
            $table->unsignedInteger('id_pengirim_surat')->nullable();
            $table->unsignedInteger('id_penerima_surat')->nullable();
            $table->text('file_arsip_surat')->nullable();
            $table->string('tipe_surat', 30);
            $table->enum('status_surat', ['Pending', 'Approve', 'Not Approve', 'Request Update', 'Revisi'])->default('Pending');
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('id_departemen')->references('id_departemen')->on('departemen')->constrained();
            $table->foreign('id_pengirim_surat')->nullable()->references('id_pengirim_surat')->on('pengirim_surat')->constrained();
            $table->foreign('id_penerima_surat')->nullable()->references('id_penerima_surat')->on('penerima_surat')->constrained();
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
        Schema::dropIfExists('arsip_surat');
    }
}
