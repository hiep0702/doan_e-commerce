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
                        <div class="container__sideBar-box-tittle">Thể loại</div>
                        <hr class="box1">
                        <div class="container__sideBar-box-cate">
                            <input type="radio" name="category" id="filter" value="Giày nam">
                            <div class="container__sideBar-box-cate-name">Giày nam</div>
                        </div>
                        <div class="container__sideBar-box-cate">
                            <input type="radio" name="category" id="filter" value="Giày nữ">
                            <div class="container__sideBar-box-cate-name">Giày nữ</div>
                        </div>
                        <div class="container__sideBar-box-cate">
                            <input type="radio" name="category" id="filter" value="Giày thời trang">
                            <div class="container__sideBar-box-cate-name">Giày thời trang</div>
                        </div>
                        <div class="container__sideBar-box-cate">
                            <input type="radio" name="category" id="filter" value="Giày thể thao">
                            <div class="container__sideBar-box-cate-name">Giày thể thao</div>
                        </div>
                    </div>
                    <div class="container__sideBar-box">
                        <div class="container__sideBar-box-tittle">Giá tiền</div>
                        <hr class="box1">
                        <div class="container__sideBar-box-cate">
                            <input type="radio" name="Price" id="filter" value="high">
                            <div class="container__sideBar-box-cate-name">Cao đến thấp</div>
                        </div>
                        <div class="container__sideBar-box-cate">
                            <input type="radio" name="Price" id="filter" value="low">
                            <div class="container__sideBar-box-cate-name">Thấp đến cao</div>
                        </div>
                    </div>
                    <div class="container__sideBar-filter">
                        <button>Lọc</button>
                    </div>
                </form>
            </div>
            <div class="container__list">
                <div class="container__list-tittle">Adidas</div>
                @foreach ($dior as $item)
                    <div class="container__list-products-item">
                        <div class="container__list-products-item-button">
                            <a href="{{ url('client/Cart/addtocart', $item->ID) }}" class="iconProduct">
                                <ion-icon name="cart-outline"></ion-icon>
                            </a>
                            <a href="{{ url('/client/wishlist/addtowishlist', $item->ID) }}" class="iconProduct">
                                <ion-icon name="heart-outline"></ion-icon>
                            </a>
                        </div>
                        <a href="{{ url('/client/products/specificProduct', $item->Slug) }}"
                            style="background-image: url({{ $item->Main_IMG }})"
                            class="container__list-products-item-img"></a>
                        <div class="container__list-products-item-info">
                            <p>{{ $item->Name }}</p>
                            <p>{{ number_format($item->Export_Price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <hr class="main1">
    </div>
    <div class="container__featured">
        <div class="container__featured-tittle">Gợi ý sản phẩm</div>
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
    </div>
    <div class="subscribeUs">
        <div class="subscribeUs__text">
            <div class="subscribeUs__text-firstText">Theo dõi chúng tôi</div>
            <div class="subscribeUs__text-secondText">Luôn theo dõi nhịp đập của thời trang hàng tuần.
                Sản phẩm mới nhất, sản phẩm sắp ra mắt, chương trình khuyến mãi đặc biệt và các sản phẩm tập trung vào xu hướng.
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
