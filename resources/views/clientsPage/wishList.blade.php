@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/wishList.css') }}">
@stop
@section('content')
    <div class="main">
        <div class="container">

            <div class="container__list">
                <div class="container__list-tittle">Favorite List</div>
                <div class="container__list-products">
                    <div class="container__list-products-top">
                        <div class="container__list-products-top-checkbox">
                            <input type="checkbox" name="" value="">
                        </div>
                        <div class="container__list-products-top-right">
                            <div class="container__list-products-top-right-total">
                                <p>Total:</p>
                                <p>{{ $total }} items</p>
                            </div>
                            <div class="container__list-products-top-right-button">
                                <a href=""><ion-icon name="cart-outline"></ion-icon></a>
                                <a href="{{ url('client/wishlist/removeMultipleProducts') }}"><ion-icon name="close-outline"></ion-icon></a>

                            </div>
                        </div>
                    </div>
                    <div class="container__list-products-list">
                        @foreach ($this_customer as $item)
                            <div class="container__list-products-list-cart">
                                <div class="container__list-products-list-cart-checkbox">
                                    <input type="checkbox" name="checkBoxes" value="{{ $item->ID }}">
                                </div>
                                <div class="container__list-products-list-cart-child">
                                    <div class="container__product-list-cart-image">
                                        <a  class="container__product-list-cart-image-img" href="{{ url('/client/products/specificProduct', $item->Slug) }}">
                                            <img src="{{ $item->Main_IMG }}" style="width: 89px; height: 110px;"
                                                alt="">
                                        </a>
                                        <a  class="container__product-list-cart-image-info" href="{{ url('/client/products/specificProduct', $item->Slug) }}">
                                            <div class="container__product-list-cart-info-name">{{ $item->Name }}</div>
                                        </a>
                                    </div>
                                    <div class="container__product-list-cart-price">
                                        <div class="colorProduct" style="background-color: {{ $item->Color }};"></div>

                                    </div>
                                    <div class="container__product-list-cart-total">${{ $item->Export_Price }}</div>
                                    <div class="container__product-list-cart-button">
                                        <a href="{{ url('/client/wishlist/addtocart', $item->ID) }}"><ion-icon name="cart-outline"></ion-icon></a>
                                        <a href="{{ url('/client/wishlist/remove', $item->ID) }}"><ion-icon name="close-outline"></ion-icon></a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="container__featured">
        <div class="container__featured-tittle">You May Also Like</div>
        <div class="container__featured-products">
            <div class="container__featured-products">
                @foreach ($ran_pro as $item)
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
@stop
