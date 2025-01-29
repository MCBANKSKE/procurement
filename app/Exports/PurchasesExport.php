<?php

namespace App\Exports;

use App\Models\PurchaseOrder;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PurchasesExport implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        return PurchaseOrder::with('product') // Load the product relationship
            ->get()
            ->map(function ($order) {
                return [
                    'ID' => $order->id,
                    'Product Name' => $order->product ? $order->product->name : 'N/A', // Get product name
                    'Quantity' => $order->quantity,
                    'Price' => $order->price,
                    'Status' => ucfirst($order->status), // Capitalize status
                    'Created At' => $order->created_at->format('Y-m-d H:i:s'),
                ];
            });
    }

    public function headings(): array
    {
        return ['ID', 'Product Name', 'Quantity', 'Price', 'Status', 'Created At'];
    }

    public function title(): string
    {
        return 'Purchases Report'; 
    }
}
