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

            if (!Schema::hasTable('units')) {
                Schema::create('units', function (Blueprint $table) {
                    $table->id();
                    $table->string('unit_name');
                    $table->string('unit_code');
                    $table->foreignId('course_id')->nullable()->constrained('courses')->nullOnDelete();
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
        Schema::dropIfExists('units');
    }
};
