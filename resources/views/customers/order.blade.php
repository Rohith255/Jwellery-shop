@extends('customers.index')
@section('content')
    @php
        $total_grams = $grams;
        $one_gram = 6038;
        $tax = 350;

        $total_price = $one_gram*$total_grams;
    @endphp
    <div class="order-box">
        <div class="order-box-01">
            <h2 style="color:rgb(247,147,30)">Billing address</h2>
            <form method="post" action="{{route('customer.order-place')}}">
                @csrf
                <div class="form-row">
                    <select name="region" required>
                        <option value="Dharmapuri">Dharmapuri</option>
                        <option value="Pidamaneri">Pidamaneri</option>
                        <option value="Oddapatti">Oddapatti</option>
                        <option value="Palacode">Palacode</option>
                        <option value="Hogenakkal">Hogenakkal</option>
                    </select>
                    <p style="color: red">@error('region'){{$message}}@enderror</p>
                    <input type="text" placeholder="Address" class="form-control" name="address" required>
                    <p style="color: red">@error('address'){{$message}}@enderror</p>
                </div>
                <div class="form-row-01">
                    <input type="number" placeholder="pincode" name="pincode" required>
                    <p style="color: red">@error('pincode'){{$message}}@enderror</p>
                    <input type="number" placeholder="mobile" name="mobile" required>
                    <p style="color: red">@error('mobile'){{$message}}@enderror</p>
                </div>
                <button type="submit" style="cursor: pointer">Confirm to place order</button>
            </form>
        </div>
        <div class="order-box-02">
            <div class="order-box-details">
                <div class="order-box-header">
                    <h3 style="color:rgb(247,147,30)">Price details</h3>
                </div>
                <div class="order-box-details-01">
                    <p>Price</p>
                    <h3>₹ {{number_format($total_price,2)}}</h3>
                </div>
                <div class="order-box-details-01">
                    <p>Taxes</p>
                    <h4>{{$tax}}</h4>
                </div>
                <div class="order-box-details-02">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                    </svg>
                    <p>Cash on Delivery</p>
                </div>
                <div class="order-box-details-03">
                    <p>Total price</p>
                    <h4>{{number_format($total_price+$tax,2)}}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
