<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Liquor <span>store</span></a>
        @if(session()->has('user'))
            <div class="order-lg-last btn-group">
            <a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="flaticon-shopping-bag"></span>
                <div id="cart-count" class="d-flex justify-content-center align-items-center"><small>{{ count(session()->get('cartContent')) }}</small></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" id="nav-cart-content">
                @foreach(session()->get('cartContent') as $cartEl)
                <div class="dropdown-item d-flex align-items-start" href="#">
                    <div class="img" style="background-image: url({{ asset('storage/assets/images/products/'.$cartEl->product->path) }});"></div>
                    <div class="text pl-3">
                        <h4>{{ $cartEl->product->brandName." ".$cartEl->product->name }}</h4>
                        <p class="mb-0"><a href="#" class="price">$25.99</a><span class="quantity ml-3">Quantity: {{ $cartEl->quantity }}</span></p>
                    </div>
                </div>
                @endforeach
                <a class="dropdown-item text-center btn-link d-block w-100" href="{{ route('cart') }}">
                    View All
                    <span class="ion-ios-arrow-round-forward"></span>
                </a>
            </div>
        </div>
        @endif

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>


        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                @foreach($menu as $item)
                    <li class="nav-item {{ request()->routeIs($item['route']) ? "active" : "" }}"><a href="{{ route($item['route']) }}" class="nav-link">{{ $item['name'] }}</a></li>
                @endforeach
                @if(session()->has('user') && session()->get('user')->role_name === "Admin")
                        <li class="nav-item"><a href="{{ route("admin.users") }}" class="nav-link">Admin</a></li>
                    @endif
            </ul>
        </div>
    </div>
</nav>
