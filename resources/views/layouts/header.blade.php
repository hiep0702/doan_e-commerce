<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/header.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <form action="">
        <div id="smallHeader" class="headerSmall ">
            <div class="headerSmallBig">
                <div class="headerSmall__logo">
                    <a href="{{ url('client/home') }}">PURSELLET</a>
                </div>
                <div id="dropSmallMenu" class="headerSmall__menu">
                    <div><a href="{{ url('client/home') }}">Home</a></div>
                    <div>Categories</div>
                    <div>Collection</div>
                    <div>Brands</div>
                    <div><a href="{{ url('client/aboutUs') }}">About Us</a></div>
                </div>
                <div class="headerSmall__right">
                        <a href="{{ url('client/myProfile') }}" class="">
                            @if (!empty($customer[0]->Avatar))
                                <div class="avatarUser"
                                    style="background-image:url('{{ asset('images/avatar/' . $customer[0]->Avatar) }}')">
                                </div>
                            @else
                                <div class="avatarUser"
                                    style="background-image:url('{{ asset('images/avatar/GOp5a-421-4212341_default-avatar-svg-h.jpg') }}')">
                                </div>
                            @endif
                        </a>
                        <a href="{{ url('client/Cart') }}" class="">
                            <div class="quantityCartSmallHead">{{ $cart_quantity }}</div>
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                        <a href="{{ url('client/wishList') }}" class="">
                            <div class="quantityCartSmallHead">{{ $wishList_quantity }}</div>
                            <ion-icon name="heart-outline"></ion-icon>
                        </a>
                </div>
                <div id="showSmallMenu" class="headerSmall__menuDrop">
                    <div class="headerSmall__menuDrop-big">
                        <div class="headerSmall__menuDrop-categories">
                            <a href="{{ url('client/products/long-wallet') }}">Long Wallet</a>
                            <a href="{{ url('client/products/small-wallet') }}">Small Wallet</a>
                            <a href="{{ url('client/products/cards-holder') }}">Cards Holder</a>
                            <a href="{{ url('client/products/chain-and-strap') }}">Chain and Strap</a>
                        </div>
                        <div class="headerSmall__menuDrop-collection">
                            <a href="{{ url('client/products/new-arrival') }}">New Arrivals</a>
                            <a href="{{ url('client/products/trending') }}">Trending</a>
                            <a href="{{ url('client/products/discount') }}">On Sales</a>
                        </div>
                        <div class="headerSmall__menuDrop-brands">
                            <a href="{{ url('client/products/dior') }}">Dior</a>
                            <a href="{{ url('client/products/gucci') }}">Gucci</a>
                            <a href="{{ url('client/products/channel') }}">Chanel</a>
                            <a href="{{ url('client/products/louis-vuiton') }}">Louis Vuiton</a>
                        </div>
                        <div class="headerSmall__menuDrop-aboutUs">
                            <a href="{{ url('client/aboutUs') }}">Store</a>
                            <a href="{{ url('client/aboutUs') }}">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header">
            <div id="header__side" class="">
                <div class="header__sideBar">
                    <div class="header__sideBar-button">
                        <button style="background-color: transparent; border: none" id="closeMenu">
                            <ion-icon style="font-size: 50px;" name="close-outline"></ion-icon>
                            <p>Menu</p>
                        </button>
                    </div>
                    <div class="header__sideBar-cate">
                        <div class="header__sideBar-cate-menu">
                            <div><a href="{{ url('client/home') }}">Home</a></div>
                            <div class="" id="dropdown1">
                                <div class="dropdown1__name">Categories</div>
                                <ion-icon name="caret-forward-outline"></ion-icon>
                            </div>
                            <div class="" id="dropdown2">
                                <div class="dropdown2__name">Collection</div>
                                <ion-icon name="caret-forward-outline"></ion-icon>
                            </div>
                            <div class="" id="dropdown3">
                                <div class="dropdown3__name">Brands</div>
                                <ion-icon name="caret-forward-outline"></ion-icon>
                            </div>
                            <div><a href="{{ url('client/Cart') }}">My Shopping Cart</a></div>
                            <div><a href="{{ url('client/wishList') }}">My Wish List</a></div>
                            <div><a href="{{ url('client/aboutUs') }}">About Us</a></div>
                        </div>
                    </div>
                </div>
                <div id="drop1" class="">
                    <div class="header__side-category">
                        <div><a href="{{ url('client/products/long-wallet') }}">Long Wallet</a></div>
                        <div><a href="{{ url('client/products/small-wallet') }}">Small Wallet</a></div>
                        <div><a href="{{ url('client/products/cards-holder') }}">Cards Holder</a></div>
                        <div><a href="{{ url('client/products/chain-and-strap') }}">Chain and Strap Wallet</a></div>
                    </div>
                </div>
                <div id="drop2" class="">
                    <div class="header__side-collection">
                        <div><a href="{{ url('client/products/new-arrival') }}">New Arrivals</a></div>
                        <div><a href="{{ url('client/products/trending') }}">Trending</a></div>
                        <div><a href="{{ url('client/products/discount') }}">On Sales</a></div>
                    </div>
                </div>
                <div id="drop3" class="">
                    <div class="header__side-brand">
                        <div><a href="{{ url('client/products/dior') }}">Dior</a></div>
                        <div><a href="{{ url('client/products/gucci') }}">Gucci</a></div>
                        <div><a href="{{ url('client/products/channel') }}">Channel</a></div>
                        <div><a href="{{ url('client/products/louis-vuiton') }}">Louis Vuitton</a></div>
                    </div>
                </div>
            </div>
            @if (Auth::guard('users')->check())
                <div id="openLog" class="header__log">
                    <div class="header__log-signed" style="">
                        <div class="header__log-signed-profile">
                            <a href="{{ url('client/myProfile') }}">My Profile</a>
                        </div>
                        <div class="header__log-signed-signOut">
                            <a href="{{ url('client/logout') }}">Sign Out</a>
                        </div>
                    </div>
                </div>
                <div id="shoppingCart" class="header__cart">
                    <div class="header__cart-tittle"><a href="{{ url('client/Cart') }}">Shopping Cart</a>
                        <button id="hideCart">
                            <ion-icon name="chevron-up-outline"></ion-icon>
                        </button>
                    </div>

                    <div class="header__cart-list">
                        @foreach ($customer_cart as $item)
                            <div class="header__cart-list-items">
                                <div class="header__cart-list-items-img"
                                    style="background-image: url('{{ $item->Main_IMG }}')"></div>
                                <div class="header__cart-list-items-info">
                                    <div class="header__cart-list-items-info-name">{{ $item->Name }}</div>
                                    <div class="header__cart-list-items-info-quantity">

                                        {{-- -- --}}
                                        <button type="button" class="decrease-quantity-btn"
                                            value="{{ $item->Product_Detail_ID }}">
                                            <ion-icon name="remove-outline"></ion-icon>
                                        </button>

                                        <div class="result1 header__cart-list-items-info-quantity-num">
                                            {{ $item->Product_quantity }}</div>

                                        {{-- ++ --}}


                                        <button type="button" class="increase-quantity-btn"
                                            value="{{ $item->Product_Detail_ID }}">
                                            <ion-icon name="add-outline"></ion-icon>
                                        </button>
                                        {{ csrf_field() }}

                                    </div>
                                </div>
                                <div class="header__cart-list-items-info-right">
                                    <div class="header__cart-list-items-info-right-price">${{ $item->Export_Price }}
                                    </div>
                                    <div class="header__cart-list-items-info-right-action">
                                        <a href="{{ url('/client/Cart/removefromcart', $item->Product_Detail_ID) }}">
                                            <ion-icon name="trash-bin-outline"></ion-icon>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="header__cart-total">
                        <p><b>Total</b></p>
                        <p class="total-price">${{ $total_price }}</p>
                    </div>
                    <div class="header__cart-checkout">
                        <a href="{{ url('client/Cart') }}">Check Out</a>
                    </div>
                </div>
                <div class="header__update">
                    <div id="topUpdate" class="header__update-all">
                        <div class="header__update-1"><a style="color: white" href=""> UPDATE: Sign in and
                                play a game to collect a discounted up to 20% code</a>
                        </div>
                        <div class="header__update-1"><a style="color: white" href=""> Use code "bananhkhoa" to
                                discount 20% on your bill</a>
                        </div>
                        <div class="header__update-1"><a style="color: white" href=""> New collection is
                                coming soon</a>
                        </div>
                    </div>
                </div>
                <div class="header__nav">
                    <div class="header__nav-menu">
                        <button style="background-color: transparent; border: none" id="openMenu">
                            <ion-icon style="font-size: 40px;" name="menu-outline"></ion-icon>
                            <p>Menu</p>
                        </button>
                    </div>
                    <div class="header__nav-logo">
                        <a style="color: black" href="{{ url('client/home') }}">
                            P U R S E L L E T
                        </a>
                    </div>
                    <div class="header__nav-right">
                        <a href="{{ url('client/myProfile') }}" class="userName">{{ $customer[0]->username }}</a>
                        <a class="iconHead" id="log">
                            {{-- <ion-icon name="person"></ion-icon> --}}
                            @if ($customer[0]->Avatar !== null)
                                <div class="avatarUser"
                                    style="background-image:url('{{ asset('images/avatar/' . $customer[0]->Avatar) }}')">
                                </div>
                            @else
                                <div class="avatarUser"
                                    style="background-image:url('{{ asset('images/avatar/GOp5a-421-4212341_default-avatar-svg-h.jpg') }}')">
                                </div>
                            @endif
                        </a>
                        <a class="iconHead" id="showCart">
                            <div class="quantityCart">{{ $cart_quantity }}</div>
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                        <a href="{{ url('client/wishList') }}" class="iconHead">
                            <div class="quantityCart">{{ $wishList_quantity }}</div>
                            <ion-icon name="heart-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            @else
                <div id="openLog" class="header__log">
                    <div class="header__log-notSign">
                        <div class="header__log-notSign-signIn">
                            <a href="{{ url('client/login') }}">Sign In</a>
                        </div>
                        <div class="header__log-notSign-signUp">
                            <a href="{{ url('client/login') }}">Sign Up</a>
                        </div>
                    </div>
                </div>
                <div id="shoppingCart" class="header__cart">
                    <div class="header__cart-tittle"><a href="{{ url('client/Cart') }}">Shopping Cart</a>
                        <button id="hideCart">
                            <ion-icon name="chevron-up-outline"></ion-icon>
                        </button>
                    </div>
                    <div class="header__cart-list">
                        <div class="header__cart-list-items">
                            <div class="header__cart-list-items-img" style="background-image: url('')"></div>
                            <div class="header__cart-list-items-info">
                                <div class="header__cart-list-items-info-name"></div>
                                <div class="header__cart-list-items-info-quantity">
                                    <button>
                                        <ion-icon name="remove-outline"></ion-icon>
                                    </button>
                                    <div class="">
                                    </div>
                                    <a>
                                        <ion-icon name="add-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            <div class="header__cart-list-items-info-right">
                                <div class="header__cart-list-items-info-right-price">
                                </div>
                                <div class="header__cart-list-items-info-right-action">
                                    <a href="">
                                        <ion-icon name="trash-bin-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header__cart-total">
                        <p><b>Total</b></p>
                        <p>$10000</p>
                    </div>
                    <div class="header__cart-checkout">
                        <button>Check out</button>
                    </div>
                </div>
                <div class="header__update">
                    <div id="topUpdate" class="header__update-all">
                        <div class="header__update-1"><a style="color: white" href=""> UPDATE: Sign in and
                                play a game to collect a discounted up to 20% code</a>
                        </div>
                        <div class="header__update-1"><a style="color: white" href=""> Use code "bananhkhoa" to
                                discount 20% on your bill</a>
                        </div>
                        <div class="header__update-1"><a style="color: white" href=""> New collection is
                                coming soon</a>
                        </div>
                    </div>
                </div>
                <div class="header__nav">
                    <div class="header__nav-menu">
                        <button style="background-color: transparent; border: none" id="openMenu">
                            <ion-icon style="font-size: 40px;" name="menu-outline"></ion-icon>
                            <p>Menu</p>
                        </button>
                    </div>
                    <div class="header__nav-logo">
                        <a style="color: black" href="{{ url('client/home') }}">
                            P U R S E L L E T
                        </a>
                    </div>
                    <div class="header__nav-right">
                        <a class="iconHead" id="log">
                            <ion-icon name="person-outline"></ion-icon>
                        </a>
                        <a class="iconHead" href="{{ url('client/login') }}">
                            {{-- <div class="quantityCart">{{ $cart_quantity }}</div> --}}
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                        <a href="{{ url('client/wishList') }}" class="iconHead">
                            {{-- <div class="quantityCart">{{ $wishList_quantity }}</div> --}}
                            <ion-icon name="heart-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            @endif

            {{-- <div class="header__update">
                <div id="topUpdate" class="header__update-all">
                    <div class="header__update-1"><a style="color: white" href=""> Sale up to 50%..</a></div>
                    <div class="header__update-1"><a style="color: white" href=""> Give code for..</a></div>
                    <div class="header__update-1"><a style="color: white" href=""> Free ship if..</a></div>
                </div>
            </div>
            <div class="header__nav">
                <div class="header__nav-menu">
                    <button style="background-color: transparent; border: none" id="openMenu">
                        <ion-icon style="font-size: 40px;" name="menu-outline"></ion-icon>
                        <p>Menu</p>
                    </button>
                </div>
                <div class="header__nav-logo">
                    <a style="color: black" href="{{ url('client/home') }}">
                        P U R S E L L E T
                    </a>
                </div>
                <div class="header__nav-right">

                    <button id="log">
                            <ion-icon name="person"></ion-icon>
                            <ion-icon name="person-outline"></ion-icon>
                    </button>
                    <button id="showCart">
                            <div class="quantityCart">{{ $cart_quantity }}</div>
                        <ion-icon name="cart-outline"></ion-icon>
                        </a>
                        <button>
                                <div class="quantityCart">{{ $wishList_quantity }}</div>
                            <ion-icon name="heart-outline"></ion-icon>
                        </button>
                </div>
            </div>
        </div> --}}
    </form>



    <script>


        var result = document.querySelectorAll("div .result1");
        $(document).ready(function() {

            // Increase
            $('.increase-quantity-btn').each(function(index) {
                $(this).on('click', function() {
                    var product = $(this).val();
                    var quantity = result[index].innerHTML
                    if (quantity == 5) {
                        return;
                    } else {
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('client.small-shopping-cart.handle-increase-quantity') }}",
                            method: "POST",
                            data: {
                                product: product,
                                _token: _token
                            },
                            success: function(data) {
                                var hehe = JSON.parse(data);
                                result[index].innerHTML = hehe[1];
                                $('.total-price').html("$" + hehe[0].subtotal);
                            }
                        })
                    }
                })
            })

            // Decrease
            $('.decrease-quantity-btn').each(function(index) {
                $(this).on('click', function() {
                    var product = $(this).val();
                    var quantity = result[index].innerHTML
                    if (quantity == 0) {
                        return;
                    } else {
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('client.small-shopping-cart.handle-decrease-quantity') }}",
                            method: "POST",
                            data: {
                                product: product,
                                _token: _token
                            },
                            success: function(data) {
                                var hehe = JSON.parse(data);
                                result[index].innerHTML = hehe[1];
                                $('.total-price').html("$" + hehe[0].subtotal);
                            }
                        })
                    }
                })
            })
        });



    </script>
    <script src="{{ asset('javascript/client/header.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
</body>


</html>
