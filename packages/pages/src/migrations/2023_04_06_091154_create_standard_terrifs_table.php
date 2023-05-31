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
        Schema::create('standard_terrifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('standard_terrif_head_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('particulars');
            $table->string('rate');
            $table->timestamps();
            // Define unique constraint on the 2 columns
            $table->unique(['standard_terrif_head_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standard_terrifs');
    }
};
