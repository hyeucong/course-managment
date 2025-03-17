<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassworkSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('classwork_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classwork_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('file_path')->nullable();
            $table->text('content')->nullable();
            $table->integer('points')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classwork_submissions');
    }
}
