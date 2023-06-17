@extends('admin.admin-dashboard')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3 text-primary">Product review</h3>
        <table class="table table-striped table-bordered container">
            <tr>
                <th>Cus ID</th>
                <th>Customer</th>
                <th>Product name</th>
                <th>Product Image</th>
                <th>Serial Number</th>
                <th>Review</th>
            </tr>
            @foreach($customers as $customer)
                @foreach($customer->productReview as $product)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$product->product->product_name}}</td>
                        <td height="150px"><img src="{{asset('products/'.$product->product->product_name)}}.jpg" style="width: 90%;height: 100%;"></td>
                        <td>{{$product->product->serial_number}}</td>
                        <td>{{$product->product_reviews}}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
        <p style="padding-left: 10px">{{$customers->links()}}</p></div>
    </div>
@endsection
