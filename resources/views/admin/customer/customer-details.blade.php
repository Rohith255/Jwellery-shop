<style>
    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 300px;
        padding: 20px;
        margin: 20px;
    }

    .card-header {
        text-align: center;
        margin-bottom: 15px;
    }

    .customer-name {
        font-size: 24px;
        font-weight: bold;
        margin: 0;
    }

    .customer-email,
    .customer-dob,
    .customer-mobile,
    .customer-address {
        margin: 0;
        font-size: 16px;
        margin-top: 8px;
    }

</style>

@extends('admin.admin-dashboard')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3 container text-primary">Customer Details</h3>
        <div class="flex-wrap">
        <div class="card">
            <div class="card-header">
                <h3 class="customer-name">{{$customers->name}}</h3>
            </div>
            <div class="card-body">
                <p class="customer-email">Email: {{$customers->email}}</p>
                <p class="customer-dob">Date of Birth: 1990-01-01</p>
                <p class="customer-mobile">Mobile: {{$customers->mobile}}</p>
                <p class="customer-address">Address: {{$customers->address}}</p>
            </div>
        </div>
        </div>
        <table class="table table-striped table-bordered container w-100">
            <tr>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Invoice</th>
                <th>Price</th>
                <th>Order date</th>
                <th>Delivery date</th>
                <th>Payment status</th>
            </tr>
            @foreach($customers->orders as $order)
                @foreach($order->orderProducts as $order_product)
            <tr>
                <td>{{$order_product->product->product_name}}</td>
                <td>{{$order_product->quantity}}</td>
                <td>{{$order_product->invoice_number}}</td>
                <td>₹ {{number_format($order_product->amount,2)}}</td>
                <td>{{$order_product->order_date}}</td>
                <td>{{$order_product->delivery_date}}</td>
                <td>{{$order_product->payment_status}}</td>
            </tr>
                @endforeach
            @endforeach
        </table>
    </div>
@endsection
