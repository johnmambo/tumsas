<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('course_rooms')) {
            Schema::create('course_rooms', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('course_id'); // Foreign key column
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

                $table->unsignedBigInteger('classroom_id'); // Foreign key column
                $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
                $table->timestamps();

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_rooms');
    }
};
