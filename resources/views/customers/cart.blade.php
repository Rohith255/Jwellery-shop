<div style="padding-top: 29vh">
    <h2 style="text-align: center; color: rgb(247,147,30)">Shopping cart</h2>
</div>
<table>
    <thead>
    <tr>
        <th>Product</th>
        <th>Product Details</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Remove</th>
    </tr>
    </thead>
    <tbody>
    @foreach($carts as $cart)
        <tr>
{{--            <td><img src="{{asset('products/'.$product->product_name)}}.jpg"></td>--}}
            <td>
                <p>{{$cart->product_id}}</p>
            </td>
            <td><form>
                    <button type="submit" class="operator">+</button>
                    <button type="submit" class="value" style="color: black">1</button>
                    <button type="submit" class="operator">-</button>
                </form></td>
            <td>₨ 24,500</td>
            <td><button class="remove-btn">Remove</button></td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="4"></td>
        <td><form action="{{route('customer.order-page')}}">
                <button type="submit">Proceed to checkout</button>
            </form></td>
    </tr>
    </tfoot>
</table>
