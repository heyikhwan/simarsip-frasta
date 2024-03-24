<?php

use App\Models\Avatar;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvatarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avatar', function (Blueprint $table) {
            $table->id('id_avatar');
            $table->text('url')->nullable();
            $table->timestamps();
        });

        Avatar::create([
            'url' => 'assets/avatar/avatar-1.jpg'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-2.jpg'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-3.jpg'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-4.jpg'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-5.jpg'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-6.jpg'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-7.png'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-8.png'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-9.png'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-10.png'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-11.jpg'
        ]);
        Avatar::create([
            'url' => 'assets/avatar/avatar-12.jpg'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avatar');
    }
}
