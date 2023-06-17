@extends('admin.admin-dashboard')
@section('content')
    @if(session('product-updated'))
        <div class="alert alert-primary mt-3 container" role="alert">
            <p>{{session('product-updated')}}</p>
        </div>
    @endif
    <h2 class="text-center mt-3 text-primary">Add Product</h2>
    <form class="container w-75 mt-4" action="{{route('product.update',$product->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row " style="height: 90px">
            <div class="col">
                <label for="first-name" class="form-label">Product name</label>
                <input type="text" class="form-control h-50 w-100" placeholder="Product name" value="{{$product->product_name}}" name="product_name" required>
                <p style="color: red">@error('product_name'){{$message}}@enderror</p>
            </div>
            <div class="col">
                <label for="profile_image" class="form-label">Product Image</label>
                <input type="file" class="form-control h-50 w-100" placeholder="Profile image" value="{{$product->product_img}}" name="product_image" required>
                <p style="color: red">@error('product_image'){{$message}}@enderror</p>
            </div>
            <div class="col">
                <label for="Category-name" class="form-label">Category name</label>
                <select class="form-select h-50" name="category_id">
                    <option value="1" class="form-control">Ring</option>
                    <option value="2" class="form-control">Bangles</option>
                    <option value="3">Necklace</option>
                    <option value="4">Chain</option>
                    <option value="5">Earrings</option>
                    <option value="6">Coins</option>
                </select>
                <p style="color: red">@error('category_id'){{$message}}@enderror</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <label for="gram" class="form-label">Weight</label>
                <input type="number" step="0.01" class="form-control h-50 w-100" value="{{$product->grams}}" placeholder="gram" name="grams" required>
                <p style="color: red">@error('grams'){{$message}}@enderror</p>
            </div>
            <div class="col">
                <label for="metal type" class="form-label">Metal type</label>
                <select class="form-select h-50" name="metal_type">
                    <option value="gold">Gold</option>
                    <option value="silver">Silver</option>
                </select>
                <p style="color: red">@error('metal_type'){{$message}}@enderror</p>
            </div>
        </div>
        <div class="row d-flex mt-4">
            <div>
                <input type="submit" class="btn btn-primary" value="Update">
                <input type="reset" class="btn btn-reddit" style="margin-left: 20px">
            </div>
        </div>
    </form>
@endsection
