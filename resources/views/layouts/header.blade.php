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
                    <a href="{{ url('client/home') }}">Sugar</a>
                </div>
                <div id="dropSmallMenu" class="headerSmall__menu">
                    <div><a href="{{ url('client/home') }}">Trang chủ</a></div>
                    <div>Thể loại</div>
                    <div>Bộ sưu tập</div>
                    <div>Thương hiệu</div>
                    <div><a href="{{ url('client/aboutUs') }}">Về chúng tôi</a></div>
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
                            <a href="{{ url('client/products/long-wallet') }}">Giày nam</a>
                            <a href="{{ url('client/products/small-wallet') }}">Giày nữ</a>
                            <a href="{{ url('client/products/cards-holder') }}">Giày thời trang</a>
                            <a href="{{ url('client/products/chain-and-strap') }}">Giày thể thao</a>
                        </div>
                        <div class="headerSmall__menuDrop-collection">
                            <a href="{{ url('client/products/new-arrival') }}">Mới nhất</a>
                            <a href="{{ url('client/products/trending') }}">Xu hướng</a>
                        </div>
                        <div class="headerSmall__menuDrop-brands">
                            <a href="{{ url('client/products/adidas') }}">Adidas</a>
                            <a href="{{ url('client/products/new-balance') }}">New Balance</a>
                            <a href="{{ url('client/products/nike') }}">Nike</a>
                            <a href="{{ url('client/products/puma') }}">Puma</a>
                        </div>
                        <div class="headerSmall__menuDrop-aboutUs">
                            <a href="{{ url('client/aboutUs') }}">Cửa hàng</a>
                            <a href="{{ url('client/aboutUs') }}">Liên hệ</a>
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
                            <div><a href="{{ url('client/home') }}">Trang chủ</a></div>
                            <div class="" id="dropdown1">
                                <div class="dropdown1__name">Thể loại</div>
                                <ion-icon name="caret-forward-outline"></ion-icon>
                            </div>
                            <div class="" id="dropdown2">
                                <div class="dropdown2__name">Bộ sưu tập</div>
                                <ion-icon name="caret-forward-outline"></ion-icon>
                            </div>
                            <div class="" id="dropdown3">
                                <div class="dropdown3__name">Thương hiệu</div>
                                <ion-icon name="caret-forward-outline"></ion-icon>
                            </div>
                            <div><a href="{{ url('client/Cart') }}">Giỏ hàng</a></div>
                            <div><a href="{{ url('client/wishList') }}">Sản phẩm yêu thích</a></div>
                            <div><a href="{{ url('client/aboutUs') }}">Về chúng tôi</a></div>
                        </div>
                    </div>
                </div>
                <div id="drop1" class="">
                    <div class="header__side-category">
                        <div><a href="{{ url('client/products/long-wallet') }}">Giày nam</a></div>
                        <div><a href="{{ url('client/products/small-wallet') }}">Giày nữ</a></div>
                        <div><a href="{{ url('client/products/cards-holder') }}">Giày thời trang</a></div>
                        <div><a href="{{ url('client/products/chain-and-strap') }}">Giày thể thao</a></div>
                    </div>
                </div>
                <div id="drop2" class="">
                    <div class="header__side-collection" style="height: 100px">
                        <div><a href="{{ url('client/products/new-arrival') }}">Mới nhất</a></div>
                        <div><a href="{{ url('client/products/trending') }}">Xu hướng</a></div>
                    </div>
                </div>
                <div id="drop3" class="">
                    <div class="header__side-brand">
                        <div><a href="{{ url('client/products/adidas') }}">Adidas</a></div>
                        <div><a href="{{ url('client/products/new-balance') }}">New Balance</a></div>
                        <div><a href="{{ url('client/products/nike') }}">Nike</a></div>
                        <div><a href="{{ url('client/products/puma') }}">Puma</a></div>
                    </div>
                </div>
            </div>
            @if (Auth::guard('users')->check())
                <div id="openLog" class="header__log">
                    <div class="header__log-signed" style="">
                        <div class="header__log-signed-profile">
                            <a href="{{ url('client/myProfile') }}">Tài khoản</a>
                        </div>
                        <div class="header__log-signed-signOut">
                            <a href="{{ url('client/logout') }}">Đăng xuất</a>
                        </div>
                    </div>
                </div>
                <div id="shoppingCart" class="header__cart">
                    <div class="header__cart-tittle"><a href="{{ url('client/Cart') }}">Giỏ hàng</a>
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
                                    <div class="header__cart-list-items-info-right-price">{{ number_format($item->Export_Price, 0, ',', '.') }}
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
                        <p><b>Tổng tiền</b></p>
                        <p class="total-price">{{ number_format($total_price, 0, ',', '.') }}</p>
                    </div>
                    <div class="header__cart-checkout">
                        <a href="{{ url('client/Cart') }}">Đặt hàng</a>
                    </div>
                </div>
                <div class="header__update">
                    <div id="topUpdate" class="header__update-all">
                        <div class="header__update-1"><a style="color: white" href=""> Cập nhật: Đăng nhập và
                            chơi trò chơi để nhận mã giảm giá lên tới 20%</a>
                        </div>
                        <div class="header__update-1"><a style="color: white" href=""> Sử dụng mã "tuanhiep" để
                            giảm giá 20% trên hóa đơn của bạn</a>
                        </div>
                        <div class="header__update-1"><a style="color: white" href=""> Bộ sưu tập mới sắp ra mắt</a>
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
                            S U G A R
                        </a>
                    </div>
                    <div class="header__nav-right">
                        <a href="{{ url('client/myProfile') }}" class="userName">{{ $customer[0]->username }}</a>
                        <a class="iconHead" id="log">
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
                            <a href="{{ url('client/login') }}">Đăng nhập</a>
                        </div>
                        <div class="header__log-notSign-signUp">
                            <a href="{{ url('client/login') }}">Đăng ký</a>
                        </div>
                    </div>
                </div>
                <div id="shoppingCart" class="header__cart">
                    <div class="header__cart-tittle"><a href="{{ url('client/Cart') }}">Giỏ hàng</a>
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
                        <div class="header__update-1"><a style="color: white" href=""> Cập nhật: Đăng nhập và
                            chơi trò chơi để nhận mã giảm giá lên tới 20%</a>
                        </div>
                        <div class="header__update-1"><a style="color: white" href=""> Sử dụng mã "tuanhiep" để
                            giảm giá 20% trên hóa đơn của bạn</a>
                        </div>
                        <div class="header__update-1"><a style="color: white" href=""> Bộ sưu tập mới sắp ra mắt</a>
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
                            S U G A R
                        </a>
                    </div>
                    <div class="header__nav-right">
                        <a class="iconHead" id="log">
                            <ion-icon name="person-outline"></ion-icon>
                        </a>
                        <a class="iconHead" href="{{ url('client/login') }}">
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                        <a href="{{ url('client/wishList') }}" class="iconHead">
                            <ion-icon name="heart-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            @endif
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
