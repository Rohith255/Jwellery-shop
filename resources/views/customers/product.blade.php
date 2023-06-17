@extends('customers.index')
@section('content')
    <div class="product-details">
        <div class="product-header">
            <h3>{{$category->categories_name}}</h3>
        </div>
        <div class="product-row">
            @foreach($category->products as $product)
                <a href="{{route('customer.view.product',$product->id)}}">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{asset('products/'.$product->product_name)}}.jpg" width="100%" height="100%">
                        </div>
                        <div class="product-card-details">
                            <div class="product-desc">
                                <h4 style="width: 100%">{{$product->product_name}}</h4>
                            </div>
                            <div class="product-cart-button">
                                <form method="post" action="{{route('customer.add-cart',$product->id)}}">
                                    @csrf
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                            <path
                                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                        </svg>
                                        <p>Add to cart</p>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
