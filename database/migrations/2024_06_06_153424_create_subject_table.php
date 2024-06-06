<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->id(); // Ini akan membuat kolom id sebagai bigint dengan auto_increment dan primary key
            $table->string('name', 50); // Nama mata pelajaran dengan panjang maksimum 50 karakter
            $table->unsignedBigInteger('teachers_id'); // Foreign key untuk teachers
            $table->unsignedBigInteger('student_id'); // Foreign key untuk students
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi foreign key
            $table->foreign('teachers_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject');
    }
}