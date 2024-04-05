<?php

use App\Models\Departemen;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departemen', function (Blueprint $table) {
            $table->integerIncrements('id_departemen');
            $table->string('nama_departemen', 50);
            $table->timestamps();
        });

        // Departemen::create([
        //     'nama_departemen' => 'Legal',
        // ]);
        // Departemen::create([
        //     'nama_departemen' => 'IT',
        // ]);
        // Departemen::create([
        //     'nama_departemen' => 'HRD',
        // ]);
        // Departemen::create([
        //     'nama_departemen' => 'Akuntansi',
        // ]);
        // Departemen::create([
        //     'nama_departemen' => 'Lelang',
        // ]);
        // Departemen::create([
        //     'nama_departemen' => 'Marketing',
        // ]);
        // Departemen::create([
        //     'nama_departemen' => 'Office Boy',
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departemen');
    }
}
