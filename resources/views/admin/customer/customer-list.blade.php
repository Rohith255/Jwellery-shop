@extends('admin.admin-dashboard')
@section('content')
    <h3 class="text-center mt-3 container text-primary">Customer List</h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Id</th>
            <th>Profile Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Mobile</th>
            <th>Address</th>
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
            <td></td>
            <td>
                <form method="post" action="#">
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </td>
        </tr>
{{--        @endforeach--}}
    </table>
@endsection
