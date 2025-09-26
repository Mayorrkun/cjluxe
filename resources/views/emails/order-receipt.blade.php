<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your CJLuxury Order Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 20px; color: #333; }
        .receipt-container { background: #fff; border-radius: 8px; padding: 20px; max-width: 600px; margin: auto; }
        h1 { color: #111; font-size: 20px; }
        .order-info { margin-bottom: 20px; }
        .order-info p { margin: 4px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; font-size: 14px; }
        th { background: #f1f1f1; }
        .total { text-align: right; font-weight: bold; }
    </style>
</head>
<body>
<div class="receipt-container">
    <h1>Thank you for your order, {{ $order->recipient }}!</h1>

    <div class="order-info">
        <p><strong>Order ID:</strong> {{ $order->reference }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
    </div>

    <table>
        <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->orderitems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 2) }}</td>
                <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p class="total">Total: ₦{{ number_format($order->total, 2) }}</p>
</div>
</body>
</html>
