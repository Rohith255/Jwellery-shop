<div class="product-details">
    <div class="product-header">
        <h3>Earrings</h3>
    </div>
    <div class="product-row">
        @foreach($products as $product)
            <a href="{{route('customer.view.product',$product->id)}}">
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{asset('products/'.$product->product_name)}}.jpg" width="100%" height="100%">
                    </div>
                    <div class="product-card-details">
                        <h4>{{$product->product_name}}</h4>
                        <div class="product-desc">
                            <div class="product-rate">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                    <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z"/>
                                </svg><h5>24,500</h5>
                            </div>
                            <div class="product-rating">
                                <p>4.2</p>
                            </div>
                        </div>
                        <div class="product-cart-button">
                            <form method="post" action="{{route('customer.add-cart',$product->id)}}">
                                @csrf
                                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                    </svg> <p>Add to cart</p></button>
                            </form>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
