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

    tr{
        height: 10px;
    }

</style>

@extends('admin.admin-dashboard')
@section('content')
    <h3 class="text-center mt-3 container text-primary">Customer Details</h3>
    <div class="d-flex">
        <div class="flex justify-content-between">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                <h3 class="customer-name">{{$customers->name}}</h3>
            </div>
            <div class="card-body">
                <p class="customer-email">Email:<br><span class="text-primary">{{$customers->email}}</span></p>
                <p class="customer-dob">Date of Birth:<br><span class="text-primary"> 1990-01-01</span></p>
                <p class="customer-mobile">Mobile:<br><span class="text-primary"> {{$customers->mobile}}</span></p>
                <p class="customer-address">Address: <br><span class="text-primary">{{$customers->address}}</span></p>
            </div>
        </div>
        </div>
        <div style="margin-left: 2%;" class="container">
        <table class="table table-bordered">
            <tr class="bg-gradient-secondary">
                <th>Product name</th>
                <th>Quantity</th>
                <th>Invoice</th>
                <th>Price</th>
                <th>Order date</th>
                <th>Delivery</th>
                <th>Payment</th>
            </tr>
            @foreach($customer_details->orders as $order)
                @foreach($order->orderProducts as $order_product)
            <tr @if($order_product->payment_status=='PENDING')
                    class="bg-inverse-danger border-secondary"
                @else
                    class="bg-inverse-info border-secondary"
                @endif>
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
    </div>

@endsection
