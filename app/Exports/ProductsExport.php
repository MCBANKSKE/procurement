<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Product::with('stock')->select('id', 'name', 'purchase_price', 'selling_price', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Purchase Price', 'Selling Price', 'Stock Balance', 'Created At'];
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->name,
            $product->purchase_price,
            $product->selling_price,
            $product->stock->sum('stock_balance') ?? 0, // Dynamically calculate stock balance
            $product->created_at,
        ];
    }
}
