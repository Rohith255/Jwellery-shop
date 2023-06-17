@extends('customers.index')
@section('content')
    <div class="category" style="padding-top: 28vh">
        <div class="category-header">
            <h2>Shop by Category</h2>
        </div>
        <div class="category-card-01">
                <div class="category-card">
                    <a href="{{route('customer.products',1)}}" style="text-decoration: none">
                    <img
                        src="{{asset('images/category/ring.jpg')}}"
                        width="100%" height="82%">
                    <p>Ring</p>
            </a>
                </div>
                <div class="category-card">
                    <a href="{{route('customer.products',6)}}" style="text-decoration: none">
                    <img
                        src="{{asset('images/category/necklace.jpg')}}"
                        width="100%" height="82%">
                    <p>Necklace</p>
            </a>
                </div>
                <div class="category-card">
                    <a href="{{route('customer.products',4)}}" style="text-decoration: none">
                    <img
                        src="{{asset('images/category/earring.png')}}"
                        width="100%" height="82%">
                    <p>Earrings</p>
            </a>
                </div>
        </div>
        <div class="category-card-01">
                <div class="category-card">
                    <a href="{{route('customer.products',3)}}" style="text-decoration: none">
                    <img
                        src="{{asset('images/category/chain.png')}}"
                        width="100%" height="82%">
                    <p>Chain</p>
            </a>
                </div>
                <div class="category-card">
                    <a href="{{route('customer.products',5)}}" style="text-decoration: none">
                    <img
                        src="{{asset('images/category/coin.jpg')}}"
                        width="100%" height="82%">
                    <p>Coins</p>
            </a>
                </div>
                <div class="category-card">
                    <a href="{{route('customer.products',2)}}" style="text-decoration: none">
                    <img
                        src="{{asset('images/category/bangle.jpg')}}"
                        width="100%" height="82%">
                    <p>Bangles</p>
                    </a>
                </div>
        </div>
    </div>
@endsection
