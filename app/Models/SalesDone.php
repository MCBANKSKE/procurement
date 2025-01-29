<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class SalesDone extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'total_amount',
        'sale_type',  // 'direct' or 'order'
    ];

    // Relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Dynamically calculate total_amount
    public function calculateTotalAmount()
    {
        return $this->quantity * $this->price;
    }

    // After creating a sales record, update stock balance and set total amount
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($salesDone) {
            // Calculate the total amount before saving
            $salesDone->total_amount = $salesDone->calculateTotalAmount();
        });

        static::created(function ($salesDone) {
            // Create a stock entry for completed sales (outbound stock movement)
            Stock::create([
                'product_id' => $salesDone->product_id,
                'quantity' => $salesDone->quantity,
                'type' => 'out',  // Type of stock movement (outbound, because items are sold)
                'price' => $salesDone->price,  // Price at the time of sale
                'stock_balance' => Stock::updateStockBalance($salesDone->product_id, -$salesDone->quantity),  // Deduct the sold quantity from stock balance
            ]);
        });
    }
}
