@php

    $one_gram = 6038;
    $tax = 350;
    $silver_one_gram = 83.50
//    $total_price = $one_gram*$total_grams;
@endphp
<style>
    .tr-row:hover{
        border-radius: 10px;
        box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.1),0px 10px 15px -3px rgba(0,0,0,0.1);
    }

    .button-go-back {
        display: inline-block;
        padding: 10px 20px;
        background-color: rgb(247,147,30);
        border: 1px solid #ddd;
        color: #333;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
        margin-left:10%;

    }
    .button-go-back a{
        color: whitesmoke;
        text-decoration: none;
    }
    .button-go-back:hover {
        background-color: rgb(247,147,30); /* Change the hover background color to a shade of gold */
        border-color: #ccc;
    }

</style>
<div style="padding-top: 29vh">
    <h2 style="text-align: center; color: rgb(247,147,30)">Shopping cart</h2>
</div>
<table>
    <thead>
    <tr>
        <th>Product</th>
        <th>Product Details</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Remove</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cart as $cart)
        @foreach($cart->products as $product)
            <tr class="tr-row">
                <td><img src="{{asset('products/'.$product->product_name)}}.jpg" width="90%" height="60%" style="border: 1px solid silver;border-radius: 10px"></td>
                <td>{{$product->product_name}}</td>
                @if($product->metal_type=='silver')
                    <td>₨. {{number_format($product->grams*$silver_one_gram*$product->pivot->quantity,2)}}</td>
                @else
                    <td>₨. {{number_format($product->grams*$one_gram*$product->pivot->quantity+$tax,2)}}</td>
                @endif
                <td>
                    <div class="cart-button-01">
                        <div class="cart-button-02">
                            <form method="post" action="{{route('customer.quantityAdd',$product->id)}}">
                                @csrf
                                <button type="submit" class="operator">+</button>
                            </form>
                            <div class="quantity-vslue">
                                {{$product->pivot->quantity}}
                            </div>
                            <form method="post" action="{{route('customer.quantitySub',$product->id)}}">
                                @csrf
                                <button type="submit" class="operator">-</button>
                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    <form method="post" action="{{route('customer.delete-cart',$product->id)}}">
                        @method('DELETE')
                        @csrf
                        <button class="remove-btn" type="submit">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        @if($cart->products!='[]')
        <td colspan="4"></td>
        <td>
            <form action="{{route('customer.checkout-page',$cart->id)}}" method="post">
                @csrf
                <button type="submit" style="cursor: pointer">Proceed to checkout</button>
            </form>
        </td>
        @endif
    </tr>
    </tfoot>

</table>
<div>
    <button class="button-go-back"><a href="{{url()->previous()}}">Back</a></button>
</div>
@if (session('added'))
    <div class="alert alert-success">
        {{ session('added') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 4000);
    </script>
@endif


@if (session('already-added'))
    <div class="alert alert-danger">
        {{ session('already-added') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 4000);
    </script>
@endif

@if (session('cart-deleted'))
    <div class="alert alert-danger">
        {{ session('cart-deleted') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 4000);
    </script>
@endif
