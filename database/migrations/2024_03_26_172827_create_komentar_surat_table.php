<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_surat', function (Blueprint $table) {
            $table->integerIncrements('id_komentar');
            $table->unsignedInteger('id_arsip_surat')->nullable();
            $table->unsignedInteger('id_user')->nullable();
            $table->string('komentar');
            $table->timestamps();

            $table->foreign('id_arsip_surat')->references('id_arsip_surat')->on('arsip_surat')->constrained()->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar_surat');
    }
}
