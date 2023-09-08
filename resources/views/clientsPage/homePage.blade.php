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
                            <p class="container__left-frame-text-p1">Best Fashion For You..</p>
                            <p class="container__left-frame-text-p2">New Fashion Collection Trends in 2023</p>
                            <a href="">Shop Now</a>
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
            <div class="container__featured-tittle">Featured Products</div>
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
                            {{-- <a href="" class="iconProduct">
                            <ion-icon name="git-compare-outline"></ion-icon>
                        </a> --}}
                        </div>
                        <a href="{{ url('/client/products/specificProduct', $item->Slug) }}"
                            style="background-image: url({{ $item->Main_IMG }})"
                            class="container__featured-products-items-img"></a>
                        <div class="container__featured-products-items-info">
                            <p>{{ $item->Name }}</p>
                            <p>${{ $item->Export_Price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container__newArrivals">
            <div class="container__newArrivals-content">
                <div class="container__newArrivals-content-tittle">
                    <a href="{{ url('client/new-arrival') }}">New Arrivals</a>
                </div>
                <div class="container__newArrivals-content-text">
                    Make bold fashion choices with our latest Purse and Wallets
                </div>
                <div class="container__newArrivals-content-button">
                    <a href="{{ url('/client/products/new-arrival') }}">
                        <p>Shop Now</p>
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
                    style="color: black">Trending Now</a> </div>
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
                            {{-- <a href="" class="iconProduct">
                                <ion-icon name="git-compare-outline"></ion-icon>
                            </a> --}}
                        </div>
                        <a href="{{ url('/client/products/specificProduct', $item->Slug) }}"
                            style="background-image: url({{ $item->Main_IMG }})"
                            class="container__featured-products-items-img"></a>
                        <div class="container__featured-products-items-info">
                            <p>{{ $item->Name }}</p>
                            <p>${{ $item->Export_Price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @foreach ($channel as $item)
            <div class="container__listCol">
                <div class="container__listCol-items">
                    <div class="container__listCol-items-img">
                        <div class="container__listCol-items-img-child"
                            style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                        <div class="container__listCol-items-img-child"
                            style="background-image: url({{ $item->After_Hover_IMG }});"></div>
                        <div class="container__listCol-items-tittle">
                            <button onclick="location.href='{{ url('client/products/channel') }}'">View More</button>
                        </div>
                    </div>
                </div>
        @endforeach
        @foreach ($dior as $item)
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->After_Hover_IMG }});"></div>
                    <div class="container__listCol-items-tittle">
                        <button onclick="location.href='{{ url('client/products/dior') }}'">View More</button>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($gucci as $item)
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->After_Hover_IMG }});">
                    </div>
                    <div class="container__listCol-items-tittle">
                        <button onclick="location.href='{{ url('client/products/gucci') }}'">View More</button>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($LV as $item)
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->After_Hover_IMG }});"></div>
                    <div class="container__listCol-items-tittle">
                        <button onclick="location.href='{{ url('client/products/louis-vuiton') }}'">View More</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="brands">
        @foreach ($channel as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Chanel</div>
            </div>
        @endforeach
        @foreach ($dior as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Dior</div>
            </div>
        @endforeach
        @foreach ($gucci as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 60px; width: 100px;" alt="">
                <div class="brands__items-name">Gucci</div>
            </div>
        @endforeach
        @foreach ($LV as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Louis Vuitton</div>
            </div>
        @endforeach
    </div>
    <div class="subscribeUs">
        <div class="subscribeUs__text">
            <div class="subscribeUs__text-firstText">Subscribe To Our Newsletter</div>
            <div class="subscribeUs__text-secondText">Keep your finger on the pulse of fashion with weekly
                round-ups
                of
                our
                latest arrivals, upcoming launches, special promotions and trend-focused editorials.
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
                <div>You will get 1 point with 1 click to the ball</div>
                <div>1 point = 1% discount on your checkout</div>
                <div>You have 15 seconds for 1 turn</div>
                <div>You can play again if you want to get higher point!</div>
                <div>You can only get the code 1 time</div>
            </div>
            <button id="startGame">Play</button>
        </div>
        <div class="title">
            <div class="gameTitle">
                <div>PURSELLET GAME</div>
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
                    <div>Score:</div>
                    <div id="pointResult"></div>
                </div>
            </div>
            <div class="scoreBoard__code">
                You will get a discount code
            </div>
            <div class="scoreBoard__code1">
                <div id="percent"></div>%
            </div>
            <div class="scoreBoard__button">
                <button id="restartGame">Play Again</button>
                <button id="getCode">Get Code</button>
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
                            alert('Discount code has been sent to your email');
                        }
                    }
                })
            })
        })
    </script>
@stop
