@extends('admin.admin-dashboard')
@section('content')
    <h3 class="text-center mt-3 container text-primary">Product List</h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Id</th>
            <th>Product image</th>
            <th>Product name</th>
            <th>Category</th>
            <th>Metal type</th>
            <th>Weight</th>
            <th>Action</th>
        </tr>
        {{--        @foreach($customers as $customer)--}}
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="d-flex justify-content-between">
                <form method="post" action="#">
                    @method('PUT')
                    <input type="submit" class="btn btn-inverse-primary" value="Update">
                </form>
                <form method="post" action="#">
                    @method('DELETE')
                    <input type="submit" class="btn btn-inverse-danger" value="Delete">
                </form>
            </td>
        </tr>
        {{--        @endforeach--}}
    </table>
@endsection
