@extends('admin.admin-dashboard')
@section('content')
    @if(session('deleted'))
        <div class="alert alert-danger mt-3 container" role="alert">
            <p>{{session('deleted')}}</p>
        </div>
    @endif
    <div class="container">
    <h3 class="text-center mt-3 container text-primary">Customer List</h3>
    <table class="table table-striped table-bordered container">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        @foreach($customers as $customer)
        <tr>
            <td>{{$customer->id}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->mobile}}</td>
            <td>{{$customer->address}}</td>
            <td class="d-flex justify-content-evenly">
                <form method="post" action="{{route('admin.customer-details',$customer->id)}}">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Details">
                </form>
                <form method="post" action="{{route('admin.customer.delete',$customer->id)}}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
@endsection
