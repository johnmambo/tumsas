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
        if (!Schema::hasTable('timetables')) {
            Schema::create('timetables', function (Blueprint $table) {
                $table->id();

                $table->unsignedBigInteger('department_id'); // Foreign key column
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

                $table->unsignedBigInteger('unit_id'); // Foreign key column
                $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

                $table->unsignedBigInteger('courses_id'); // Foreign key column
                $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');

                $table->unsignedBigInteger('classroom_id'); // Foreign key column
                $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');

                $table->unsignedBigInteger('day_id'); // Foreign key column
                $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');

                $table->unsignedBigInteger('timeslot_id'); // Foreign key column
                $table->foreign('timeslot_id')->references('id')->on('timeslots')->onDelete('cascade');

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
        Schema::dropIfExists('timetables');
    }
};
