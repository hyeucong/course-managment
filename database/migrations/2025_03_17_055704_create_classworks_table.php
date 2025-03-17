<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassworksTable extends Migration
{
    public function up()
    {
        Schema::create('classworks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->integer('points')->default(100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classworks');
    }
}
