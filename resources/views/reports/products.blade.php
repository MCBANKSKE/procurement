<!DOCTYPE html>
<html>
<head>
    <title>Products Report</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Products Report</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Purchase Price</th>
                <th>Selling Price</th>
                <th>Stock Balance</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->stock_balance }}</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
