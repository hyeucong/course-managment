<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_code')->unique();
            $table->string('slug')->unique();
            $table->string('lecturer');
            $table->string('room')->nullable();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->enum('status', ['active', 'inactive', 'completed'])->default('active');
            $table->text('schedule')->nullable();
            $table->text('description')->nullable();
            $table->string('background_url')->default('https://images.unsplash.com/photo-1740166260052-b41e5381bcbb?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
