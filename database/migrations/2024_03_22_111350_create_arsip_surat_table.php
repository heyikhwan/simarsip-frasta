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
            $table->id('id_arsip_surat');
            $table->string('kode_surat', 20);
            $table->date('tanggal_surat');
            $table->date('tanggal_diterima');
            $table->string('perihal', 100);
            $table->foreignId('id_departemen')->references('id_departemen')->on('departemen')->constrained();
            $table->foreignId('id_pengirim_surat')->nullable()->references('id_pengirim_surat')->on('pengirim_surat')->constrained();
            $table->foreignId('id_penerima_surat')->nullable()->references('id_penerima_surat')->on('penerima_surat')->constrained();
            $table->text('file_arsip_surat')->nullable();
            $table->string('tipe_surat', 30);
            $table->enum('status_surat', ['Pending','Approve','Not Approve','Request Update','Revisi'])->default('Pending');
            $table->text('komentar')->nullable();
            $table->foreignId('user_id')->references('id_user')->on('users')->constrained();
            $table->timestamps();
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
