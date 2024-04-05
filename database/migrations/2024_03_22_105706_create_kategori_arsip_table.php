<?php

use App\Models\KategoriArsip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriArsipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_arsip', function (Blueprint $table) {
            $table->integerIncrements('id_kategori_arsip');
            $table->string('nama_kategori_arsip', 50);
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });

        // KategoriArsip::create([
        //     'nama_kategori_arsip' => 'SKCK',
        // ]);
        // KategoriArsip::create([
        //     'nama_kategori_arsip' => 'KTP',
        // ]);
        // KategoriArsip::create([
        //     'nama_kategori_arsip' => 'Ijazah SMA',
        // ]);
        // KategoriArsip::create([
        //     'nama_kategori_arsip' => 'Ijazah S1',
        // ]);
        // KategoriArsip::create([
        //     'nama_kategori_arsip' => 'Lisensi SKB',
        // ]);
        // KategoriArsip::create([
        //     'nama_kategori_arsip' => 'Lisensi ASKB',
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_arsip');
    }
}
