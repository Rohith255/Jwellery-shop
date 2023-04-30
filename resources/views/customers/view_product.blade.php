<div class="cart-details">
<div class="cart-box">
<div class="cart-img">
<img src="{{asset('products/'.$product->product_name)}}.jpg" width="90%" height="60%" style="border: 1px solid goldenrod">
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
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z"/>
                            </svg> 4750/GM(18KT)</h3>
                    </div>
                </div>
                <div class="product-details-box-02">
                    <div class="product-details-box-03">
                        <h3>Weight</h3>
                        <h3>:</h3>
                    </div>
                    <div class="product-details-box-04">
                        <h3>{{$product->grams}}gm</h3>
                    </div>
                </div>
                <div class="product-details-box-02">
                    <div class="product-details-box-03">
                        <h3>Price</h3>
                        <h3>:</h3>
                    </div>
                    <div class="product-details-box-04">
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z"/>
                            </svg>24,500</h3>
                    </div>
                </div>
                <div class="product-details-box-02">
                    <div class="product-details-box-03">
                        <h3>Discount</h3>
                        <h3>:</h3>
                    </div>
                    <div class="product-details-box-04">
                        <h3>60% off</h3>
                    </div>
                </div>
                <div class="product-details-box-02" style="border: none">
                    <div class="product-details-box-03">
                        <h3>Final price</h3>
                        <h3>:</h3>
                    </div>
                    <div class="product-details-box-04">
                        <h3><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z"/>
                            </svg>22,900</h3>
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
            <div class="cart-button-01">
                <div class="cart-button-02">
                    <form>
                        <button type="submit" class="operator">+</button>
                        <button type="submit" class="value">1</button>
                        <button type="submit" class="operator">-</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
