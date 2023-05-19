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
            $table->integer('gender');
            $table->string('phone_number');
            $table->string('residential_address');
            $table->string('date_of_birth');
            $table->string('cv_path');
            $table->boolean('willingness_to_travel')->nullable();
            $table->integer('expected_salary')->nullable();
            $table->integer('last_salary')->nullable();
            $table->date('earliest_starting_date')->nullable();
            $table->foreignId('position_id');
            $table->foreignId('agency_id');
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
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
