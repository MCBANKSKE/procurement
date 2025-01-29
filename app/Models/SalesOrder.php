<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'price', // The price at the time of sale
        'total_amount', // Dynamically calculated: price * quantity
        'status', // Status like pending, completed, cancelled
    ];

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Calculate total_amount before saving
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($salesOrder) {
            // Calculate total_amount dynamically
            $salesOrder->total_amount = $salesOrder->price * $salesOrder->quantity;
        });
    }
}
