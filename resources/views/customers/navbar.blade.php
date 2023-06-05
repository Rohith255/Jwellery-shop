<div style="width: 100%;height: 27vh;position: fixed;background-color: white;box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
<div class="rate-box">
    <div class="rate-box-number">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
            </svg><p> +91 9486409515</p>
    </div>
    <div class="gold-rate">
        <h4>Gold rate : </h4>
    </div>
</div>
<div class="navbar">
    <div class="navbar-logo">
        <img src="{{asset('images/new-logo.png')}}">
    </div>
    <div class="navbar-search">
        <form>
            <input type="text" placeholder="search">
        </form>
    </div>
    <div class="nav-btns">
        <div class="nav-btns-01">
            <a href="{{route('customer.cart')}}">
            <button class="nav-button"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                </svg>
                Cart
            </button>
            </a>

            <a href="{{route('customer.my-order')}}">
                <button class="nav-button" style="align-items: center;margin-left: -12%"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    My Order
                </button>
            </a>

                @if(\Illuminate\Support\Facades\Auth::guard('customer')->check())
                <button class="nav-login-button">
                    <a href="{{route('customer.profile')}}">Profile</a>
                </button>
                <button class="nav-login-button" style="margin-left: 4px">
                    <a href="{{route('customer.logout')}}">Logout</a>
                </button>
                @else
                    <button class="nav-login-button">
                        <a href="{{route('customer.register')}}">Register</a>
                    </button>
                <button class="nav-login-button"  style="margin-left: 8px">
                    <a href="{{route('customer.login')}}">Login</a>
                </button>
                @endif

        </div>
    </div>
</div>
<div class="nav-category">
    <div class="nav-category-details">
        <ul>
            <li><a href="{{route('customer.home')}}">Home</a></li>
            <li><a href="{{route('customer.all-product')}}">All Jwellery</a></li>
            <li><a href="{{route('customer.category')}}">Gold</a></li>
            <li><a href="{{route('silver-products')}}">Silver</a></li>
            <li><a href="{{route('customer.coins')}}">Coins</a></li>
        </ul>
    </div>
</div>
</div>
