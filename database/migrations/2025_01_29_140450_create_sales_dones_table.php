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
        Schema::create('sales_dones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Link to Product
            $table->integer('quantity'); // Quantity of the product sold
            $table->decimal('price', 10, 2); // Price at the time of sale
            $table->decimal('total_amount', 10, 2)->nullable(); // Dynamically calculated as quantity * price
            $table->enum('sale_type', ['direct', 'order'])->default('direct'); // Type of sale (direct or from order)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_dones');
    }
};
