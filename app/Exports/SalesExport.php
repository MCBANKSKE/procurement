<?php

namespace App\Exports;

use App\Models\SalesDone;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class SalesExport implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        return SalesDone::with('product') // Load product relationship
            ->get()
            ->map(function ($sale) {
                return [
                    'ID' => $sale->id,
                    'Product Name' => $sale->product ? $sale->product->name : 'N/A', // Get product name
                    'Quantity' => $sale->quantity,
                    'Price' => $sale->price,
                    'Total Amount' => $sale->total_amount,
                    'Sale Type' => ucfirst($sale->sale_type), // Capitalize sale type
                    'Created At' => $sale->created_at->format('Y-m-d H:i:s'),
                ];
            });
    }

    public function headings(): array
    {
        return ['ID', 'Product Name', 'Quantity', 'Price', 'Total Amount', 'Sale Type', 'Created At'];
    }

    public function title(): string
    {
        return 'Sales Report'; // Title of the Excel sheet
    }
}
