<div class="profile-section">
    <div class="profile-section-01">
        <a href="{{route('customer.profile')}}"><button style="background-color: white;color: black">My profile</button></a>
        <a href="#"><button>My cart</button></a>
    </div>
    @foreach($orders as $order)
        @foreach($order->products as $product)
            <div class="order-details-box">
        <div class="order-details-box-01">
            <img src="{{asset('products/'.$product->product_name)}}.jpg" width="90%" height="100%">
        </div>
        <div class="order-details-box-02">
            <h3>{{$product->product_name}}</h3>
            <div class="order-details-box-03">
                <div class="order-invoice-01">
                    <h5>INVOICE</h5>
                    <h5>:</h5>
                </div>
                <div class="order-invoice-02">
                    {{$product->pivot->invoice_number}}
                </div>
            </div>
            <div class="order-details-box-03">
                <div class="order-invoice-01">
                    <h5>Order date</h5>
                    <h5>:</h5>
                </div>
                <div class="order-invoice-02">
                    {{$product->pivot->order_date}}
                </div>
            </div>
            <div class="order-details-box-03">
                <div class="order-invoice-01">
                    <h5>Delivery date</h5>
                    <h5>:</h5>
                </div>
                <div class="order-invoice-02">
                    {{$product->pivot->delivery_date}}
                </div>
            </div>
            <div class="order-cancel">
                <button type="submit">Cancel order</button>
            </div>
        </div>
    </div>
        @endforeach
    @endforeach
</div>
