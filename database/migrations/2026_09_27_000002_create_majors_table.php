<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->string('faculty_name');
            $table->string('major_name');
            $table->enum('degree', ['D3', 'S1', 'S2']);
            $table->unsignedTinyInteger('weight_r')->default(0);
            $table->unsignedTinyInteger('weight_i')->default(0);
            $table->unsignedTinyInteger('weight_a')->default(0);
            $table->unsignedTinyInteger('weight_s')->default(0);
            $table->unsignedTinyInteger('weight_e')->default(0);
            $table->unsignedTinyInteger('weight_c')->default(0);
            $table->text('description');
            $table->text('career_prospects')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};
