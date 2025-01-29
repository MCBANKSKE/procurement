<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Exports\PurchasesExport;
use App\Exports\SalesExport;
use App\Models\Product;
use App\Models\SalesDone;
use App\Models\PurchaseOrder;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Export Products Report
    public function exportProducts($format)
    {
        if ($format === 'excel') {
            return Excel::download(new ProductsExport, 'products.xlsx');
        } elseif ($format === 'pdf') {
            $products = Product::all();
            $pdf = Pdf::loadView('reports.products', compact('products'));
            return $pdf->download('products.pdf');
        }
    }

    // Export Purchases Report
    public function exportPurchases($format)
    {
        if ($format === 'excel') {
            return Excel::download(new PurchasesExport, 'purchases.xlsx');
        } elseif ($format === 'pdf') {
            $purchases = PurchaseOrder::all();
            $pdf = Pdf::loadView('reports.purchases', compact('purchases'));
            return $pdf->download('purchases.pdf');
        }
    }

    // Export Sales Report
    public function exportSales($format)
    {
        if ($format === 'excel') {
            return Excel::download(new SalesExport, 'sales.xlsx');
        } elseif ($format === 'pdf') {
            $sales = SalesDone::all();
            $pdf = Pdf::loadView('reports.sales', compact('sales'));
            return $pdf->download('sales.pdf');
        }
    }
}
