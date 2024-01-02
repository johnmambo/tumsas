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
            if (!Schema::hasTable('courses')) {
                Schema::create('courses', function (Blueprint $table) {
                    $table->id();
                    $table->string('course_name');
                    $table->string('course_code');
                    $table->string('course_type');
                    $table->string('course_capacity');
                    $table->unsignedBigInteger('department_id'); // Foreign key column
                    $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
};
