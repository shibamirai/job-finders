<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobFindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_finders', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->string('name');
            $table->integer('gender')->default(0);
            $table->integer('age');
            $table->integer('handicap')->default(0);
            $table->boolean('has_certificate')->default(false);
            $table->date('use_from');
            $table->string('skills')->nullable();
            $table->string('occupation');
            $table->string('description')->nullable();
            $table->date('hired_at');
            $table->integer('employment_pattern');
            $table->boolean('is_handicaps_opened');
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
        Schema::dropIfExists('job_finders');
    }
}
