@extends('admin.admin-dashboard')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center mt-3 text-primary">Order details</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Customer name</th>
                <th>Product name</th>
                <th>Metal type</th>
                <th>Weight</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Order date</th>
                <th>Delivery date</th>
                <th>Invoice number</th>
            </tr>
            @foreach($orders as $order)
                    @foreach($order->products as $products)
            <tr>
                <td>{{$order->customer->name}}</td>
                <td>{{$products->product_name}}</td>
                <td>{{$products->metal_type}}</td>
                <td>{{$products->grams}}.gm</td>
                <td>{{$products->pivot->amount}}</td>
                <td>{{$products->pivot->quantity}}</td>
                <td>{{$products->pivot->order_date}}</td>
                <td>{{$products->pivot->delivery_date}}</td>
                <td>{{$products->pivot->invoice_number}}</td>
            </tr>
                    @endforeach
                @endforeach
        </table>
        <p style="padding-left: 10px">{{$orders->links()}}</p>
    </div>
@endsection
