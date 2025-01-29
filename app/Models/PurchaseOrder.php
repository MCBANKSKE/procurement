<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'price',  // Purchase price at the time of order
        'status',
    ];

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
