<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'type', // 'in' for incoming stock, 'out' for outgoing stock
        'price', // Price at the time of stock movement
        'stock_balance', // The running stock balance
    ];

    // Relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Static method to update stock balance
    public static function updateStockBalance($productId, $quantity)
    {
        // Get the most recent stock record for the product
        $currentStock = Stock::where('product_id', $productId)->latest()->first();

        if ($currentStock) {
            // Calculate the new stock balance
            $newBalance = $currentStock->stock_balance + $quantity;

            // Ensure stock balance doesn't go below zero
            if ($newBalance < 0) {
                throw new \Exception('Not enough stock available.');
            }
        } else {
            // If no stock exists, initialize it with the quantity
            // If the quantity is negative, throw an exception because it doesn't make sense to initialize negative stock
            if ($quantity < 0) {
                throw new \Exception('Cannot initialize with negative stock.');
            }
            $newBalance = $quantity;
        }

        return $newBalance; // Return the updated stock balance
    }

    // Method to record a stock movement
    public static function recordStockMovement($productId, $quantity, $price)
    {
        // Calculate the new stock balance
        $newBalance = self::updateStockBalance($productId, $quantity);

        // Create the stock movement record
        return self::create([
            'product_id' => $productId,
            'quantity' => $quantity,
            'type' => $quantity > 0 ? 'in' : 'out', 
            'price' => $price,
            'stock_balance' => $newBalance,
        ]);
    }
}
