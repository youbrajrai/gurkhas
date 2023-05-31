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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('vendor_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vendor_type_id')->constrained()->cascadeOnDelete();
            $table->string('address');
            $table->string('contact_person');
            $table->string('contact_details');
            $table->text('contract_start_date');
            $table->text('contract_expiry_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
