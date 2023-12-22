@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/homepage.css') }}">
@stop
@section('content')

    <div class="container">
        <div class="container__slideCol">
            <div id="slideS" class="container__slideCol-list">
                @foreach ($top_slides_img as $top)
                    <div style="background-image: url({{ $top->IMG }})" class="container__slideCol-item">
                        <div class="container__slideCol-item-content">
                            <p style="color: #FF0000" class="container__left-frame-text-p1">Sản phẩm tốt nhất cho bạn..</p>
                            <p style="color: #FF0000" class="container__left-frame-text-p2">Xu hướng mới năm 2023</p>
                            <a href="{{ url('/client/products/new-arrival') }}">Mua ngay</a>
                        </div>
                    </div>
                @endforeach
                <div id="prevBut" class="container__slideCol-list-button">
                    <button id="prev">
                        <ion-icon name="chevron-back-outline"></ion-icon>
                    </button>
                </div>
                <div id="nextBut" class="container__slideCol-list-button">
                    <button id="next">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </button>
                </div>
            </div>
        </div>
        <div class="container__featured">
            <div class="container__featured-tittle">Sản phẩm nổi bật</div>
            <div class="container__featured-products">
                @foreach ($randomPro as $item)
                    <div class="container__featured-products-items">
                        <div class="container__featured-products-items-button">
                            <a href="{{ url('client/Cart/addtocart', $item->ID) }}" class="iconProduct">
                                <ion-icon name="cart-outline"></ion-icon>
                            </a>
                            <a href="{{ url('/client/wishlist/addtowishlist', $item->ID) }}" class="iconProduct">
                                <ion-icon name="heart-outline"></ion-icon>
                            </a>
                        </div>
                        <a href="{{ url('/client/products/specificProduct', $item->Slug) }}"
                            style="background-image: url({{ $item->Main_IMG }})"
                            class="container__featured-products-items-img"></a>
                        <div class="container__featured-products-items-info">
                            <p>{{ $item->Name }}</p>
                            <p>{{ number_format($item->Export_Price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container__newArrivals">
            <div class="container__newArrivals-content">
                <div class="container__newArrivals-content-tittle">
                    <a href="{{ url('client/new-arrival') }}">Sản phẩm mới</a>
                </div>
                <div class="container__newArrivals-content-text">
                    Giày thời trang cao cấp 
                </div>
                <div class="container__newArrivals-content-button">
                    <a href="{{ url('/client/products/new-arrival') }}">
                        <p>Mua ngay</p>
                    </a>
                </div>
            </div>
            <div class="container__newArrivals-collection" style="background-image: url();">
                <div id="colListNew" class="container__newArrivals-collection-slide">
                    @foreach ($middle_slides_img as $middle)
                        <div class="container__newArrivals-collection-list"
                            style="background-image: url({{ $middle->IMG }});">
                        </div>
                    @endforeach
                    <div class="container__newArrivals-collection-button">
                        <button id="prevNew">
                            <ion-icon name="chevron-back-outline"></ion-icon>
                        </button>
                        <button id="nextNew">
                            <ion-icon name="chevron-forward-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container__featured">
            <div class="container__featured-tittle"><a href="url('/client/products/trending') "
                    style="color: black">Đang là xu hướng</a> </div>
            <div class="container__featured-products">
                @foreach ($trending as $item)
                    <div class="container__featured-products-items">
                        <div class="container__featured-products-items-button">
                            <a href="{{ url('client/Cart/addtocart', $item->ID) }}" class="iconProduct">
                                <ion-icon name="cart-outline"></ion-icon>
                            </a>
                            <a href="{{ url('/client/wishlist/addtowishlist', $item->ID) }}" class="iconProduct">
                                <ion-icon name="heart-outline"></ion-icon>
                            </a>
                        </div>
                        <a href="{{ url('/client/products/specificProduct', $item->Slug) }}"
                            style="background-image: url({{ $item->Main_IMG }})"
                            class="container__featured-products-items-img"></a>
                        <div class="container__featured-products-items-info">
                            <p>{{ $item->Name }}</p>
                            <p>{{ number_format($item->Export_Price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @foreach ($nike as $item)
            <div class="container__listCol">
                <div class="container__listCol-items">
                    <div class="container__listCol-items-img">
                        <div class="container__listCol-items-img-child"
                            style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                        <div class="container__listCol-items-img-child"
                            style="background-image: url({{ $item->After_Hover_IMG }});"></div>
                        <div class="container__listCol-items-tittle">
                            <button onclick="location.href='{{ url('client/products/nike') }}'">Xem thêm</button>
                        </div>
                    </div>
                </div>
        @endforeach
        @foreach ($adidas as $item)
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->After_Hover_IMG }});"></div>
                    <div class="container__listCol-items-tittle">
                        <button onclick="location.href='{{ url('client/products/adidas') }}'">Xem thêm</button>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($newBalance as $item)
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->After_Hover_IMG }});">
                    </div>
                    <div class="container__listCol-items-tittle">
                        <button onclick="location.href='{{ url('client/products/new-balance') }}'">Xem thêm</button>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($puma as $item)
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->After_Hover_IMG }});"></div>
                    <div class="container__listCol-items-tittle">
                        <button onclick="location.href='{{ url('client/products/puma') }}'">Xem thêm</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="brands">
        @foreach ($nike as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Nike</div>
            </div>
        @endforeach
        @foreach ($adidas as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Adidas</div>
            </div>
        @endforeach
        @foreach ($newBalance as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 60px; width: 100px;" alt="">
                <div class="brands__items-name">New Balance</div>
            </div>
        @endforeach
        @foreach ($puma as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Puma</div>
            </div>
        @endforeach
    </div>
    <div class="subscribeUs">
        <div class="subscribeUs__text">
            <div class="subscribeUs__text-firstText">Đăng ký hội viên</div>
            <div class="subscribeUs__text-secondText">Luôn theo dõi nhịp đập của thời trang hàng tuần.
                Sản phẩm mới nhất, sản phẩm sắp ra mắt, chương trình khuyến mãi đặc biệt và các sản phẩm tập trung vào xu hướng.
            </div>
            <form action="" method="POST">
                @csrf
                <div class="subscribeUs__text-input">
                    <input type="text" placeholder="Email address" name="subscribe_email" autocomplete="off">
                    <button type="submit">Subscribe</button>
                    @error('subscribe_email')
                        {{ $message }}
                    @enderror
                </div>
            </form>
        </div>
    </div>
    </div>

    <div class="scrollBackToTop">
        <button id="scrollUp">
            <ion-icon name="chevron-up-outline"></ion-icon>
        </button>
    </div>
    @if ($compare_number > 0)
        <div class="compareProducts">
            <div class="compareProducts__quantity">
                {{ $compare_number }}
            </div>
            <a href="{{ url('/client/products/compareproduct') }}">
                <ion-icon name="git-compare-outline"></ion-icon>
            </a>
        </div>
    @endif
    @if(Auth::guard('users')->check())
    <div id="openGame" class="PlayGame">
        <button id="openBoardGame" class="openBoardGame">
            <div>Play</div>
            <div id="flag">Game</div>
        </button>
        <button id="openBoardGame2" class="PlayGame__logo">
            <ion-icon name="game-controller"></ion-icon>
        </button>
        <div id="startBoard" class="start">
            <div class="start__content">
                <div>Bạn sẽ nhận được 1 điểm chỉ với 1 cú click vào bóng</div>
                <div>1 điểm = giảm giá 1% khi thanh toán</div>
                <div>Bạn có 15 giây cho 1 lượt</div>
                <div>Bạn có thể chơi lại nếu muốn đạt điểm cao hơn!</div>
                <div>Bạn chỉ có thể nhận được mã 1 lần</div>
            </div>
            <button id="startGame">Chơi</button>
        </div>
        <div class="title">
            <div class="gameTitle">
                <div>SUGAR GAME</div>
            </div>
            <div class="title__left">
                <ion-icon name="alarm-outline"></ion-icon>
                <div id="time" class="timerCount"></div>
            </div>
            <div id="point" class="title__point"></div>
        </div>
        <div id="boardGame" class="game">
            <button type="button" id="click"></button>
        </div>
        <div id="resultBoard" class="result">
            <div id="score" class="scoreBoard">
                <div class="scoreBoard__result">
                    <div>Điểm:</div>
                    <div id="pointResult"></div>
                </div>
            </div>
            <div class="scoreBoard__code">
                Bạn sẽ nhận được mã giảm giá
            </div>
            <div class="scoreBoard__code1">
                <div id="percent"></div>%
            </div>
            <div class="scoreBoard__button">
                <button id="restartGame">Chơi lại</button>
                <button id="getCode">Nhận mã</button>
                {{ csrf_field() }}
            </div>
        </div>
    </div>
    @endif
    <script src="{{ asset('javascript/client/homepage.js') }}"></script>
    <script src="{{ asset('javascript/client/scrollUp.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#getCode').click(function() {
                var discount = $('#percent').html();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('client-home-page.get-code') }}",
                    method: "POST",
                    data: {
                        discount: discount,
                        _token: _token
                    },
                    success: function(data) {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            alert('Mã giảm giá đã được gửi tới email của bạn');
                        }
                    }
                })
            })
        })
    </script>
@stop
