@extends('customers.index')
@section('content')
    @if($orders=='[]')
        <div class="no-order">
            <div class="no-order-text">
                <h2>No Orders</h2>
                <p>There are no orders to display.</p>
            </div>
        </div>
    @else
        <div class="or">
            @foreach($orders as $order)
                @foreach($order->products as $product)
                    @if($product->pivot->payment_status=='PENDING')
                        <div class="order-details">
                            <div class="product">
                                <div class="product-image-01">
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
                                    <form method="post"
                                          action="{{route('customer.order-cancel',['orderId'=>$order->id,'productId'=>$product->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="cancel-order" type="submit">Cancel Order</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>

        @if (session('placed'))
            <div class="alert alert-success" style="background-color:  #c3e6cb;  border-color: #c3e6cb;color: black;">
                {{ session('placed') }}
            </div>
            <script>
                setTimeout(function () {
                    $('.alert').fadeOut('fast');
                }, 4000);
            </script>
        @endif

        @if (session('deleted'))
            <div class="alert alert-success">
                {{ session('deleted') }}
            </div>
            <script>
                setTimeout(function () {
                    $('.alert').fadeOut('fast');
                }, 4000);
            </script>
        @endif
    @endif
@endsection
