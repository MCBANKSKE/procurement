<!DOCTYPE html>
<html>
<head>
    <title>Purchases Report</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Purchases Report</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->product->name }}</td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>{{ number_format($purchase->price, 2) }}</td>
                    <td>{{ ucfirst($purchase->status) }}</td>
                    <td>{{ $purchase->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
