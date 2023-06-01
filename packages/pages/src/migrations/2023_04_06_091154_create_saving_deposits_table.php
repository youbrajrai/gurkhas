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
        Schema::create('saving_deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interest_head_id')->constrained()->cascadeOnDelete();
            $table->string('particulars');
            $table->string('min_balance');
            $table->string('interest_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saving_deposits');
    }
};