@extends('admin.admin-dashboard')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3 text-primary">Product review</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Customer ID</th>
                <th>Customer name</th>
                <th>Product ID</th>
                <th>Product name</th>
                <th>Serial Number</th>
                <th>Review</th>
            </tr>
            @foreach($customers as $customer)
                @foreach($customer->productReview as $product)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$product->product->id}}</td>
                        <td>{{$product->product->product_name}}</td>
                        <td>{{$product->product->serial_number}}</td>
                        <td>{{$product->product_reviews}}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </div>
@endsection
