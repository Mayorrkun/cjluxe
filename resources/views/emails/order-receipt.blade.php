
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
        .product-img {
            height: 40px;
            width: auto;
            margin-right: 6px;
            vertical-align: middle;
            object-fit: contain;
        }
    </style>
</head>
<body>
<div class="receipt-container">
    <h1>Thank you for your order, {{ $order->recipient }}!</h1>

    <div class="order-info">
        <p><strong>Order ID:</strong> {{ $order->reference }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
        <p><strong>Order ID:</strong> {{ $order->recipient }}</p>
        <p><strong>Payment Status:</strong>{{$order->status}}</p>
        @if($order->is_delivered === 0)
            <p><strong>Delivery Status:</strong>Not Delivered</p>

        @else
            <p><strong>Delivery Status:</strong>Delivered</p>
        @endif


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
            @php
                $image = $item->product->images->first();
                $imagePath = $image?->img_src;

                // Default placeholder
                $finalImagePath = public_path('images/placeholder.png');

                if ($imagePath) {
                    // If stored via storage/app/public
                    if (str_starts_with($imagePath, 'storage/')) {
                        $finalImagePath = public_path($imagePath);
                    }
                    // If stored directly in public/images
                    elseif (file_exists(public_path('images/' . $imagePath))) {
                        $finalImagePath = public_path('images/' . $imagePath);
                    }
                    // If already an absolute path (rare case)
                    elseif (file_exists(public_path($imagePath))) {
                        $finalImagePath = public_path($imagePath);
                    }
                }
            @endphp
            <tr>
                <td>
                    <img src="{{ $finalImagePath }}" class="product-img" alt="" style="max-height:60px; max-width:60px;">
                    {{ $item->product?->product_name ?? 'Unknown Product' }}
                </td>
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
