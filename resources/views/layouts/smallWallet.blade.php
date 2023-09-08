@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/productPage.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/subsAndScroll.css') }}">
@stop
@section('content')
<div class="main">
    <div class="container">
        <div class="container__sideBar">
            <form action="" method="GET">
                <div class="container__sideBar-search">
                    <button>
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                    <input type="text" placeholder="Search" name="searchBox">
                </div>
                <div class="container__sideBar-box">
                    <div class="container__sideBar-box-tittle">Brands</div>
                    <hr class="box1">
                    <div class="container__sideBar-box-cate">
                        <input type="radio" name="brands" id="filter" value="Gucci">
                        <div class="container__sideBar-box-cate-name">Gucci</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="radio" name="brands" id="filter" value="Louis Vuitton">
                        <div class="container__sideBar-box-cate-name">Louis Vuitton</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="radio" name="brands" id="filter" value="Dior">
                        <div class="container__sideBar-box-cate-name">Dior</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="radio" name="brands" id="filter" value="Chanel">
                        <div class="container__sideBar-box-cate-name">Chanel</div>
                    </div>
                </div>
                <div class="container__sideBar-box">
                    <div class="container__sideBar-box-tittle">Price</div>
                    <hr class="box1">
                    <div class="container__sideBar-box-cate">
                        <input type="radio" name="Price" id="filter" value="high">
                        <div class="container__sideBar-box-cate-name">High to low</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="radio" name="Price" id="filter" value="ow">
                        <div class="container__sideBar-box-cate-name">Low to high</div>
                    </div>
                </div>
                {{-- <div class="container__sideBar-box">
                    <div class="container__sideBar-box-tittle">Collection</div>
                    <hr class="box1">
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">New Arrivals</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">Trending</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">Discount</div>
                    </div>
                </div> --}}
                <div class="container__sideBar-filter">
                    <button type="submit">Filter</button>
                </div>
            </form>
        </div>
            <div class="container__list">
                <div class="container__list-tittle">Small Wallet</div>
                <div class="container__list-products">
                    @foreach ($smallWallet as $item)
                    <div class="container__list-products-item">
                        <div class="container__list-products-item-button">
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
                            class="container__list-products-item-img"></a>
                        <div class="container__list-products-item-info">
                            <p>{{ $item->Name }}</p>
                            <p>${{ $item->Export_Price }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <hr class="main1">
    </div>
    <div class="container__featured">
        <div class="container__featured-tittle">You May Also Like</div>
        <div class="container__featured-products">
            <div class="container__featured-products">
                @foreach ($randomProduct as $item)
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
            <div class="subscribeUs__text-input">
                <input type="text" placeholder="Email address" autocomplete="off">
                <button>Subscribe</button>
            </div>
        </div>
    </div>
    <div class="scrollBackToTop">
        <button id="scrollUp">
            <ion-icon name="chevron-up-outline"></ion-icon>
        </button>
    </div>
    <script src="{{ asset('javascript/client/scrollUp.js') }}"></script>
@stop
