<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id(); // Ini akan membuat kolom id sebagai bigint dengan auto_increment dan primary key
            $table->integer('umur'); // Umur sebagai integer
            $table->string('bio', 45); // Bio dengan panjang maksimum 45 karakter
            $table->string('alamat', 45); // Alamat dengan panjang maksimum 45 karakter
            $table->unsignedBigInteger('user_id'); // Foreign key untuk users
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
