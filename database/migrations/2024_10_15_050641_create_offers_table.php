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
        Schema::create('offers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Title of the offer
            $table->text('description'); // Detailed description of the offer
            $table->decimal('discount', 5, 2)->nullable(); // Discount percentage (optional)
            $table->date('valid_until')->nullable(); // Date the offer is valid until
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
