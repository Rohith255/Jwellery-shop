<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/customer/customer-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/profile.css')}}">
    <link rel="stylesheet"href="{{asset('css/customer/my-cart.css')}}">
    <title>My Cart</title>
</head>
<body>
@include('customers.navbar')
@include('customers.my-cart')
</body>
</html>
