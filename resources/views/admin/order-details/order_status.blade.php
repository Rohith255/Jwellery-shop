@extends('admin.admin-dashboard')
@section('content')
    <div class="container-fluid">
        @if(session('order'))
            <div class="alert alert-success mt-3 container" role="alert">
                <p>{{session('order')}}</p>
            </div>
        @endif
        <h3 class="text-center mt-3 text-primary">Order details</h3>
        <table class="table table-bordered table-striped table-bordered">
            <tr>
                <th>Customer name</th>
                <th>Product name</th>
                <th>Order date</th>
                <th>Delivery date</th>
                <th>Status</th>
                <th>Invoice number</th>
                <th>Action</th>
            </tr>
            @foreach($orders as $order)
                @foreach($order->products as $products)
                    <tr>
                        <td>{{$order->customer->name}}</td>
                        <td>{{$products->product_name}}</td>
                        <td>{{$products->pivot->order_date}}</td>
                        <td>{{$products->pivot->delivery_date}}</td>
                        <td>{{$products->pivot->payment_status}}</td>
                        <td>{{$products->pivot->invoice_number}}</td>
                        @if($products->pivot->payment_status=='DELIVERED')
                            <td>Completed</td>
                        @else
                            <td class="h-100">
                                <form method="post" action="{{route('admin.status-change',['orderId'=>$products->pivot->order_id,'productId'=>$products->id])}}" class="w-100 h-100">
                                    @csrf
                                    <button type="submit" class="btn-inverse-primary">Delivered</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
        </table>
        <p style="padding-left: 10px">{{$orders->links()}}</p>
    </div>
@endsection
