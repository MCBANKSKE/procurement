<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Allow mass assignment on these fields
    protected $fillable = [
        'name',
        'description',
        'purchase_price',
        'selling_price',
        'quantity',
        'supplier_id',
    ];

    // relationship with the Supplier model
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    // Accessor to get the latest stock balance
    public function getStockBalanceAttribute()
    {
        return $this->stock()->latest()->value('stock_balance') ?? 0; // Default to 0 if no stock exists
    }

    
    // Automatically log stock movement when quantity is updated
    public static function boot()
    {
        parent::boot();

        static::saved(function ($product) {
            // If quantity changes, log the stock movement
            if ($product->isDirty('quantity')) {
                $difference = $product->quantity - $product->getOriginal('quantity');

                // Determine if the movement is "in" (added) or "out" (removed)
                $type = $difference > 0 ? 'in' : 'out';

                // Calculate stock balance after this change
                $newBalance = $product->quantity;

                // Create a stock movement record
                Stock::create([
                    'product_id' => $product->id,
                    'quantity' => abs($difference),
                    'type' => $type,
                    'price' => $product->purchase_price, // You could choose selling_price if desired
                    'stock_balance' => $newBalance,
                ]);
            }
        });
    }
}
