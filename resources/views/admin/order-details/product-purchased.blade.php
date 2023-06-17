@extends('admin.admin-dashboard')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3 text-primary">Order details</h3>
        <table class="table container table-bordered">
            <tr class="bg-gradient-light border-secondary">
                <th>Customer</th>
                <th>Product name</th>
                <th>Metal type</th>
                <th>Weight</th>
                <th>Amount</th>
                <th>Ordered</th>
                <th>Delivered</th>
                <th>Status</th>
                <th>Invoice</th>
            </tr>
            @foreach($orders as $order)
                    @foreach($order->products as $products)
            <tr @if($products->pivot->payment_status=='PENDING')
                    class="bg-inverse-danger border-secondary"
            @else
                class="bg-inverse-info border-secondary"
            @endif >
                <td>{{$order->customer->name}}</td>
                <td>{{$products->product_name}}</td>
                <td>{{$products->metal_type}}</td>
                <td>{{$products->grams}}.gm</td>
                <td>₹.{{number_format($products->pivot->amount,2)}}</td>
                <td>{{$products->pivot->order_date}}</td>
                <td>{{$products->pivot->delivery_date}}</td>
                <td>{{$products->pivot->payment_status}}</td>
                <td>{{$products->pivot->invoice_number}}</td>
            </tr>
                    @endforeach
                @endforeach
        </table>
        <p style="padding-left: 10px">{{$orders->links()}}</p>
    </div>
@endsection
