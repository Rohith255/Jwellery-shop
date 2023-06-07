<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <!-- plugins:css -->
    {{--    <link rel="stylesheet" href="{{asset('star/vendors/feather/feather.css')}}">--}}
    <link rel="stylesheet" href="{{asset('star/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('star/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('star/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('star/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('star/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('star/js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('star/css/vertical-layout-light/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- endinject -->
</head>
<body>
<h2 style="margin-top: 8px;">You order has been placed successfully!</h2>

<br>

<h3> Thank you for your order!</h3>
<div>
<table class="table table-striped table-bordered w-75" style="margin-top: 8px">
    <tr>
        <th>Product name</th>
        <th>Quantity</th>
        <th>Address</th>
        <th>Ordered date</th>
        <th>Deliverey dtae</th>
    </tr>
    @foreach($recent_order->orderProducts as $order)
        <tr>
            <td>{{$order->product->product_name}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->delivery_address}}</td>
            <td>{{$order->order_date}}</td>
            <td>{{$order->delivery_date}}</td>
        </tr>
    @endforeach
</table>
    <br>
    <div class="mt-2">
        <h4 class="text-gray">Thanks,</h4><br>
        <h5 style="color: rgb(247,147,30);">Sahana Jewellers</h5>
    </div>

</div>
</body>
</html>
