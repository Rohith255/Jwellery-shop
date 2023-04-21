@extends('admin.admin-dashboard')
@section('content')
    <h2 class="text-center mt-3 text-primary">Add Product</h2>
    <form class="container w-75 mt-4" action="/insert" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row " style="height: 90px">
            <div class="col">
                <label for="first-name" class="form-label">Product name</label>
                <input type="text" class="form-control h-50 w-100" placeholder="First name" name="product_name" required>
            </div>
            <div class="col">
                <label for="profile_image" class="form-label">Product Image</label>
                <input type="file" class="form-control h-50 w-100" placeholder="Profile image" name="product_image" required>
            </div>
            <div class="col">
                <label for="last-name" class="form-label">Category name</label>
                <select class="form-select h-50">
                    <option value="1" class="form-control">Ring</option>
                    <option value="2" class="form-control">Bangles</option>
                    <option value="3">Necklace</option>
                    <option value="4">Chain</option>
                    <option value="5">Earrings</option>
                    <option value="6">Coins</option>
                </select>
            </div>
        </div>
        <div class="row" style="height: 90px">
            <div class="col">
                <label for="gram" class="form-label">Weight</label>
                <input type="number" step="0.01" class="form-control h-50 w-100" placeholder="gram" name="gram" required>
            </div>
            <div class="col">
                <label for="metal type" class="form-label">Metal type</label>
                <select class="form-select h-50">
                    <option value="gold">Gold</option>
                    <option value="silver">Silver</option>
                </select>
            </div>
        </div>
        <div class="row d-flex">
            <div>
                <input type="submit" class="btn btn-primary">
                <input type="reset" class="btn btn-reddit" style="margin-left: 20px">
            </div>
        </div>
    </form>
@endsection
