<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PurchaseRequestNotification;

class PurchaseRequest extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'product_id',
        'quantity',
        'notes',
        'status',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Auto-create Purchase Order & Send Email when approved
    protected static function boot()
    {
        parent::boot();

        static::created(function ($request) {
            // Send email notification on creation using the notify() method
            $request->notify(new PurchaseRequestNotification($request, 'submitted'));
        });

        static::updated(function ($request) {
            if ($request->isDirty('status') && $request->status === 'approved') {
                // Auto-create Purchase Order
                PurchaseOrder::create([
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'status' => 'pending',
                ]);

                // Send email notification on approval using the notify() method
                $request->notify(new PurchaseRequestNotification($request, 'approved'));
            }
        });
    }
}
