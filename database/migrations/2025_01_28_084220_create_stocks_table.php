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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Product associated with stock
            $table->integer('quantity')->default(0); // Quantity added or removed
            $table->enum('type', ['in', 'out']); // Type of movement: in (added to stock) or out (sold)
            $table->decimal('price', 10, 2)->nullable(); // Price at the time of stock movement
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
