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
        Schema::create('standard_terrif_heads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('month');
            $table->foreignId('fiscal_year_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            // Define unique constraint on the two columns
            $table->unique(['title', 'month']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standard_terrif_heads');
    }
};
