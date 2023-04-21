@extends('admin.admin-dashboard')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3 text-primary">Product review</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Customer name</th>
                <th>Product name</th>
                <th>Metal type</th>
                <th>Order date</th>
                <th>Delivery date</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Invoice number</th>
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
            </tr>
            {{--        @endforeach--}}
        </table>
    </div>
@endsection
