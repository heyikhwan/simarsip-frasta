<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->string('nama_karyawan', 100);
            $table->string('nik', 20);
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan']);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('kontak', 25)->nullable();
            $table->string('email', 100)->nullable();
            $table->enum('status_karyawan', ['Karyawan Kontrak','Karyawan Tetap']);
            $table->string('pendidikan_terakhir', 10)->nullable();
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
        Schema::dropIfExists('karyawan');
    }
}
