<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/customer/customer-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/hero.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/review.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/footer.css')}}">
    <title>Home</title>
</head>
<body>
<div>
    @include('customers.navbar')
    @include('customers.hero')
    @include('customers.review_page')
    @include('customers.footer')
</div>
</body>
</html>
