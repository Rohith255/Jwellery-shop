@extends('customers.index')
@section('content')
    <div class="cart-details">
        <div class="cart-box">
            <div class="cart-img">
                <img src="{{asset('products/'.$product->product_name)}}.jpg" width="90%" height="60%"
                     style="@if($product->metal_type=='gold')
            border: 1px solid goldenrod;
            @else
                border:1px solid silver;
            @endif">
            </div>
            <div class="cart-product-details">
                <div class="product-detail-header">
                    <h4>DCAPG12C4</h4>
                    <h2>{{strtoupper($product->product_name)}}</h2>
                </div>
                <div class="view_product-details-box">
                    <div class="view_product-details-box-01">
                        <div class="view_product-details-box-02">
                            <div class="view_product-details-box-03">
                                <h3>Metal Type</h3>
                                <h3>:</h3>
                            </div>
                            <div class="view_product-details-box-04">
                                <h3>{{$product->metal_type}}</h3>
                            </div>
                        </div>
                        <div class="view_product-details-box-02">
                            <div class="view_product-details-box-03">
                                <h3>Rate</h3>
                                <h3>:</h3>
                            </div>
                            <div class="view_product-details-box-04">
                                <h3>@if($product->metal_type=='gold')
                                        ₹6038/GM(24KT)
                                    @else
                                        ₹150/GM
                                    @endif
                                </h3>
                            </div>
                        </div>
                        <div class="view_product-details-box-02">
                            <div class="view_product-details-box-03">
                                <h3>Weight</h3>
                                <h3>:</h3>
                            </div>
                            <div class="view_product-details-box-04">
                                <h3>{{$product->grams}}.gm</h3>
                            </div>
                        </div>
                        <div class="view_product-details-box-02">
                            <div class="view_product-details-box-03">
                                <h3>Price</h3>
                                <h3>:</h3>
                            </div>
                            <div class="view_product-details-box-04">
                                <h3>@if($product->metal_type=='gold')
                                        ₹.{{6038*$product->grams}}
                                    @else
                                        ₹.{{150*$product->grams}}
                                    @endif
                                </h3>
                            </div>
                        </div>
                        <div class="view_product-details-box-02">
                            <div class="view_product-details-box-03">
                                <h3>Discount</h3>
                                <h3>:</h3>
                            </div>
                            <div class="view_product-details-box-04">
                                <h3>10% off</h3>
                            </div>
                        </div>
                        <div class="view_product-details-box-02" style="border: none">
                            <div class="view_product-details-box-03">
                                <h3>Final price</h3>
                                <h3>:</h3>
                            </div>
                            <div class="view_product-details-box-04">
                                @php
                                    $product_price = 6038*$product->grams;
                                    $discount_value = $product_price*0.1;
                                    $discount_price = $product_price-$discount_value;
                                @endphp
                                <h3>@if($product->metal_type=='gold')
                                        ₹{{number_format($discount_price,2)}}
                                    @else
                                        @php
                                            $silver_product = 150*$product->grams;
                                            $silver_discount = $silver_product*0.1;
                                            $silver_price = $silver_product-$silver_discount;
                                        @endphp
                                        ₹{{number_format($silver_price,2)}}
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="view_product-cart-button">
                    <div class="view_product-cart-button-01">
                        <form method="post" action="{{route('customer.add-cart',$product->id)}}">
                            @csrf
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                     class="bi bi-bag" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                </svg>
                                <p>Add to cart</p></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="review-section">
        <h1>Review</h1>
        @if(Auth::guard('customer')->check())
        <div class="review-box">
                <form method="post"
                      action="{{route('customer.product-review',[$product->id,Auth::guard('customer')->id()])}}" class="fmm">
                    @csrf
                    <input type="text" placeholder="Product review" name="product_review">
                    <button type="submit">Submit</button>
                    <p style="color: red">@error('password'){{$message}}@enderror</p>
                </form>
        </div>
        @endif
        @if($reviews=='[]')
            <p>No reviews :( </p>
        @else
            <div class="comment-section">
                <h2>Review Section</h2>
                @foreach($reviews as $review)
                    <div class="comment">
                        <div class="comment-header">
                            <h4 class="customer-name">Customer Name - {{$review->customer->name}}</h4>
                        </div>
                        <div class="comment-body">
                            <p class="review-content">Review - {{$review->product_reviews}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    @endif
@endsection
