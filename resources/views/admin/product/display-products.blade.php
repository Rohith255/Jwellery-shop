@extends('admin.admin-dashboard')
@section('content')
    <div class="w-100 h-100 container">
        @if(session('product-updated'))
            <div class="alert alert-warning mt-3 container" role="alert">
                <p>{{session('product-updated')}}</p>
            </div>
        @endif
            @if(session('product-deleted'))
                <div class="alert alert-danger mt-3 container" role="alert">
                    <p>{{session('product-deleted')}}</p>
                </div>
            @endif
    <h3 class="text-center mt-3 container text-primary">Product List</h3>
    <table class="table table-striped table-bordered container">
        <tr>
            <th>Id</th>
            <th>Product image</th>
            <th>Product name</th>
            <th>Category</th>
            <th>Metal type</th>
            <th>Weight</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->product_img}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->category_id}}</td>
            <td>{{$product->metal_type}}</td>
            <td>{{$product->grams}}</td>
            <td class="d-flex justify-content-between">
                <form method="post" action="{{route('product.update.page',$product->id)}}">
                    @csrf
                    <input type="submit" class="btn btn-inverse-primary" value="Update">
                </form>
                <form method="post" action="{{route('product.delete',$product->id)}}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-inverse-danger" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <p style="padding-left: 10px">{{$products->links()}}</p></div>
@endsection
