<!DOCTYPE html>
<html>
<head>
    <title>Purchase Request {{ ucfirst($request->status) }}</title>
</head>
<body>
    <h3>Purchase Request {{ ucfirst($request->status) }}</h3>
    <p>Product: {{ $request->product->name }}</p>
    <p>Quantity: {{ $request->quantity }}</p>
    <p>Status: {{ ucfirst($request->status) }}</p>
    <p>Notes: {{ $request->notes }}</p>
</body>
</html>
