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
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
             $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Link to the Product model
            $table->integer('quantity'); // The quantity of the product sold
            $table->decimal('price', 10, 2); // The price at the time of sale
            $table->decimal('total_amount', 10, 2)->nullable(); // Store the total price (price * quantity)
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending'); // Status of the order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};
