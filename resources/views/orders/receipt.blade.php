@props(['order'])
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CJLuxury Receipt</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 13px;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #222;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .logo {
            height: 60px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 26px;
            color: #1a1a1a;
            letter-spacing: 1px;
        }
        .header small {
            font-size: 12px;
            color: #555;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 4px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }
        th {
            background: #f4f4f4;
            font-weight: bold;
        }
        tbody tr:nth-child(even) {
            background: #fafafa;
        }
        .product-img {
            height: 40px;
            width: auto;
            margin-right: 6px;
            vertical-align: middle;
            object-fit: contain;
        }
        .total {
            text-align: right;
            margin-top: 10px;
            font-size: 15px;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 30px;
            color: #666;
        }
        .brand {
            font-weight: bold;
            color: #111;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Header -->
    <div class="header">
        <!-- Logo -->
        <img src="{{ public_path('images/logo/logo.png') }}" alt="CJLuxury Logo" class="logo">
        <h1>CJLuxury</h1>
        <small>Luxury Redefined</small>
    </div>

    <!-- Order Details -->
    <div class="details">
        <p><strong>Order ID:</strong> #{{ $order->reference }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
        <p><strong>Customer:</strong> {{ $order->recipient }}</p>
        <p><strong>Email:</strong> {{ $order->user->email }}</p>
    </div>

    <!-- Order Items -->
    <table>
        <thead>
        <tr>
            <th style="width: 50%">Product</th>
            <th style="width: 10%">Qty</th>
            <th style="width: 5%">Size</th>
            <th style="width: 15%">Price</th>
            <th style="width: 20%">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->orderitems as $item)
            <tr>
                <td>
                    <img src="{{ public_path($item->product->images->first()->img_src) }}" class="product-img" alt="">
                    {{ $item->product->product_name }}
                </td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->size }}</td>
                <td>₦{{ number_format($item->price, 2) }}</td>
                <td>₦{{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Total -->
    <div class="total">
        Total: ₦{{ number_format($order->total, 2) }}
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Thank you for shopping with <span class="brand">CJLuxury</span>!</p>
        <p>For support, contact us at support@cjluxury.com</p>
    </div>
</div>
</body>
</html>
