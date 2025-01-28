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

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

     // Automatically update stock when quantity is updated
    public static function boot()
    {
        parent::boot();

        static::saved(function ($product) {
            // Check if the quantity has changed and update stock accordingly
            // Here you can adjust stock movements, e.g., adding or removing stock
            // Example: If quantity is updated, we could log it into the Stock table
            if ($product->isDirty('quantity')) {
                $difference = $product->quantity - $product->getOriginal('quantity');

                // Add or remove stock based on the difference
                if ($difference > 0) {
                    // Stock was added
                    Stock::create([
                        'product_id' => $product->id,
                        'quantity' => $difference,
                        'type' => 'in',  // Stock added
                        'price' => $product->purchase_price,
                    ]);
                } elseif ($difference < 0) {
                    // Stock was removed
                    Stock::create([
                        'product_id' => $product->id,
                        'quantity' => abs($difference),
                        'type' => 'out', // Stock removed
                        'price' => $product->selling_price,
                    ]);
                }
            }
        });
    }
}
