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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('degree');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('residentail_address');
            $table->string('date_of_birth');
            $table->string('cv_path');
            $table->boolean('willingness_to_travel');
            $table->string('reason_for_leaving')->nullable();
            $table->integer('expected_salary');
            $table->date('earliest_starting_date');
            $table->foreignId('position_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
