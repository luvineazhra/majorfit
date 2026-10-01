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
        Schema::create('assessment_results', function (Blueprint $table) {
            $table->id();
            $table->string('nama_maba');
            $table->string('email_maba');
            $table->string('no_wa')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('status')->default('in_progress');
            $table->decimal('score_r', 5, 2)->default(0);
            $table->decimal('score_i', 5, 2)->default(0);
            $table->decimal('score_a', 5, 2)->default(0);
            $table->decimal('score_s', 5, 2)->default(0);
            $table->decimal('score_e', 5, 2)->default(0);
            $table->decimal('score_c', 5, 2)->default(0);
            $table->foreignId('top_1_major_id')->nullable()->constrained('majors')->nullOnDelete();
            $table->foreignId('top_2_major_id')->nullable()->constrained('majors')->nullOnDelete();
            $table->foreignId('top_3_major_id')->nullable()->constrained('majors')->nullOnDelete();
            $table->text('ai_explanation')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_results');
    }
};
