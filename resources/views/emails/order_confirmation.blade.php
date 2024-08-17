<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h2>{{ $data['subject'] }}</h2>
    <p>{{ $data['body'] }}</p>

    <h3>Order Details:</h3>
    <p>User: {{ $data['user']->name }}</p>
    <p>Email: {{ $data['user']->email }}</p>

    <h3>Ordered Items:</h3>
    <ul>
        @foreach ($data['cartItems'] as $item)
            <li>{{ $item['name'] }} - Quantity: {{ $item['quantity'] }} - Price: ${{ $item['price'] }}</li>
        @endforeach
    </ul>

    <h3>Total Price: ${{ $data['totalCartPrice'] }}</h3>
</body>
</html>
