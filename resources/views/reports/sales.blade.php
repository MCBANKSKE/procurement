<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Sales Report</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Amount</th>
                <th>Sale Type</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->product->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ number_format($sale->price, 2) }}</td>
                    <td>{{ number_format($sale->total_amount, 2) }}</td>
                    <td>{{ ucfirst($sale->sale_type) }}</td>
                    <td>{{ $sale->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
