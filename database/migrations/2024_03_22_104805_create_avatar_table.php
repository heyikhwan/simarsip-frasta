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

        for ($i = 1; $i <= 10; $i++) {
            Avatar::create([
                'url' => 'assets/avatar/avatar-' . $i . '.jpg'
            ]);
        }
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
