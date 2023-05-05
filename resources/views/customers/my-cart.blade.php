<div class="or">
@foreach($orders as $order)
    @foreach($order->products as $product)
        <div class="order-details">
            <div class="product">
                <div class="product-image">
                    <img src="{{asset('products/'.$product->product_name)}}.jpg" alt="Product"/>
                </div>
                <div class="product-info">
                    <h3 style="color: rgb(247,147,30)">{{$product->product_name}}</h3>
                    <p class="quantity">Quantity: {{$product->pivot->quantity}}</p>
                    <p class="price">₹.{{number_format($product->pivot->amount,2)}}</p>
                </div>
                <div class="order-info">
                    <p style="font-weight: bold;">Invoice: {{$product->pivot->invoice_number}}</p>
                    <p>Order date: {{$product->pivot->order_date}}</p>
                    <p>Delivery date: {{$product->pivot->delivery_date}}</p>
                </div>
                <div class="actions">
                    <form method="post" action="{{route('customer.order-cancel',['orderId'=>$order->id,'productId'=>$product->id])}}">
                        @method('DELETE')
                        @csrf
                    <button class="cancel-order" type="submit">Cancel Order</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endforeach
</div>

