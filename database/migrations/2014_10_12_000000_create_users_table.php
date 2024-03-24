<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama_lengkap', 100);
            $table->string('email', 100)->unique()->nullable();
            $table->string('password');
            $table->text('profile')->nullable();
            $table->enum('level', ['karyawan','admin','manajer'])->default('karyawan');
            $table->foreignId('id_departemen')->nullable()->references('id_departemen')->on('departemen')->constrained();
            $table->timestamps();
        });

        User::create([
            'nama_lengkap' => 'Subur Permana',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'profile' => 'assets/profile-images/17101254507367.jpg',
            'level' => 'admin',
            'id_departemen' => 2
        ]);

        User::create([
            'nama_lengkap' => 'Asep Saipul Hamdi',
            'email' => 'manajer@gmail.com',
            'password' => Hash::make('manajer'),
            'profile' => 'assets/profile-images/17101254507367.jpg',
            'level' => 'manajer',
            'id_departemen' => 1
        ]);

        User::create([
            'nama_lengkap' => 'Ilham Prasetia',
            'email' => 'karyawan@gmail.com',
            'password' => Hash::make('karyawan'),
            'profile' => 'assets/profile-images/17101254507367.jpg',
            'level' => 'karyawan',
            'id_departemen' => 3
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
