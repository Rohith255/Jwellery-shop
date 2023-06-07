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
                <h2>{{$product->product_name}}</h2>
            </div>
            <div class="product-rating-box">
                <div class="rating-box">
                    4.5
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                    </svg>
                </div>
            </div>
            <div class="product-details-box">
                <div class="product-details-box-01">
                    <div class="product-details-box-02">
                        <div class="product-details-box-03">
                            <h3>Metal Type</h3>
                            <h3>:</h3>
                        </div>
                        <div class="product-details-box-04">
                            <h3>{{$product->metal_type}}</h3>
                        </div>
                    </div>
                    <div class="product-details-box-02">
                        <div class="product-details-box-03">
                            <h3>Rate</h3>
                            <h3>:</h3>
                        </div>
                        <div class="product-details-box-04">
                            <h3>@if($product->metal_type=='gold')
                                    ₹6038/GM(24KT)
                                @else
                                    ₹150/GM
                                @endif
                            </h3>
                        </div>
                    </div>
                    <div class="product-details-box-02">
                        <div class="product-details-box-03">
                            <h3>Weight</h3>
                            <h3>:</h3>
                        </div>
                        <div class="product-details-box-04">
                            <h3>{{$product->grams}}.gm</h3>
                        </div>
                    </div>
                    <div class="product-details-box-02">
                        <div class="product-details-box-03">
                            <h3>Price</h3>
                            <h3>:</h3>
                        </div>
                        <div class="product-details-box-04">
                            <h3>@if($product->metal_type=='gold')
                                    ₹.{{6038*$product->grams}}
                                @else
                                    ₹.{{150*$product->grams}}
                                @endif
                            </h3>
                        </div>
                    </div>
                    <div class="product-details-box-02">
                        <div class="product-details-box-03">
                            <h3>Discount</h3>
                            <h3>:</h3>
                        </div>
                        <div class="product-details-box-04">
                            <h3>10% off</h3>
                        </div>
                    </div>
                    <div class="product-details-box-02" style="border: none">
                        <div class="product-details-box-03">
                            <h3>Final price</h3>
                            <h3>:</h3>
                        </div>
                        <div class="product-details-box-04">
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
            <div class="product-cart-button">
                <div class="product-cart-button-01">
                    <form method="post" action="{{route('customer.add-cart',$product->id)}}">
                        @csrf
                        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg> <p>Add to cart</p></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="review-section">
    <h1>Review</h1>
    <div class="review-box">
        @if(Auth::guard('customer')->check())
            <form method="post" action="{{route('customer.product-review',[$product->id,Auth::guard('customer')->id()])}}">
                @csrf
                <input type="text" placeholder="Product review" name="product_review">
                <button type="submit">Submit</button>
            </form>
        @endif
    </div>
    @if($reviews=='[]')
        <p>No reviews :( </p>
    @else
        <div class="comment-section">
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
