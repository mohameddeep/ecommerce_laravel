<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>order details</title>
</head>
<body>
<h1>order details</h1>
customer name : <span>{{ $order->name }}</span><br>
customer email : <span>{{ $order->email }}</span><br>
customer phone : <span>{{ $order->phone }}</span><br>
customer address : <span>{{ $order->address }}</span><br>
product name : <span>{{ $order->product_name }}</span><br>
product price : <span>{{ $order->price }}</span><br>
product quantity : <span>{{ $order->quantity }}</span><br>
payment status : <span>{{ $order->payment_status }}</span><br>
delivery status : <span>{{ $order->delivery_status }}</span><br>
{{-- product image : <span><img src="{{ asset('images').'/'.$order->product_image}}" ></span> --}}
</body>
</html>
