<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_finder_id')->constrained()->cascadeOnDelete();
            $table->string('content');
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->string('languages');
            $table->integer('creation_time')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('works');
    }
};
