<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        h1, h2 {
            margin-top: 0;
        }
        h1 {
            font-size: 24px;
        }
        h2 {
            font-size: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        td {
            text-align: center;
        }
        .total {
            margin-top: 20px;
            font-size: 18px;
            text-align: right;
        }
    </style>
</head>
<body>
<div>
    <h1>Invoice</h1>

</div>

<div>

    <h2>Customer Information</h2>
    <p><strong>Name:</strong> {{ $customerName }}</p>
    <p><strong>Address:</strong> {{ $fullAddress }}</p>
</div>

<table>
    <thead>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($selectedProducts as $product)
        <tr>
            <td>{{ $product['name'] }}</td>
            <td>${{ $product['price'] }}</td>
            <td>{{ $product['quantity'] }}</td>
            <td>${{ $product['price'] * $product['quantity'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<p class="total">Total: ${{ $totalPrice }}</p>
</body>
</html>


