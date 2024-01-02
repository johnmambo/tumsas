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
        
        if (!Schema::hasTable('lecturer_units')) {
            Schema::create('lecturer_units', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('lecturer_id'); // Foreign key column
                $table->foreign('lecturer_id')->references('id')->on('lecturers')->onDelete('cascade');

                $table->unsignedBigInteger('unit_id'); // Foreign key column
                $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
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
        Schema::dropIfExists('lecturer_units');
    }
};
