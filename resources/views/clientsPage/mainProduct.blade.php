@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/product.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/subsAndScroll.css') }}">

    @stop
@section('content')
    <div class="main">
        <form action="" method="POST">
            @csrf
            <div class="container">
                @foreach ($product as $item)
                    <div class="container__productImage">
                        <div class="container__productImage-preview">
                            <div class="container__productImage-preview-image"
                                style="background-image: url({{ $item->Main_IMG }})"></div>
                            <div class="container__productImage-preview-image"
                                style="background-image: url({{ $item->Slide_IMG_1 }});"></div>
                            <div class="container__productImage-preview-image"
                                style="background-image: url({{ $item->Slide_IMG_2 }});"></div>
                        </div>
                        <div id="abc" class="container__productImage-mainImage"
                            style="background-image: url({{ $item->Main_IMG }})"></div>
                    </div>
                    <div class="container__productInfo">
                        <div class="container__productInfo-main">
                            <div class="container__productInfo-main-info">
                                <div class="top">
                                    <div class="top__name">{{ $item->Name }}</div>
                                    <a class="top__favor" href="{{ url('/client/wishlist/addtowishlist', $item->ID) }}">
                                        <ion-icon name="heart-outline"></ion-icon>
                                    </a>
                                </div>
                                <div class="price">
                                    <div class="price__official">$<b>{{ $item->Export_Price }}</b></div>
                                </div>
                                <div class="color">
                                    @foreach ($getColor as $item)
                                        <a style="background-color: {{ $item->Color }}"
                                            href="{{ url('/client/products/specificProduct', $item->Slug) }}"></a>
                                    @endforeach
                                </div>
                                {{-- <a href="{{ url('/client/products/compareproduct', $item->ID) }}">so sanh</a> --}}
                            </div>
                            <button id="compare" value="{{ $item->ID }}"><ion-icon name="git-compare-outline"></ion-icon></button>

                            <div class="container__productInfo-main-add">
                                <button type="submit">Add to cart</button>
                            </div>
                            <hr>
                            <div class="container__productInfo-main-descrip">
                                <h2>Description</h2>
                                <ul>
                                    <li>{{ $item->Information }}</li>
                                </ul>
                            </div>
                            <hr>
                            <div class="container__productInfo-main-details">
                                <h2>Details</h2>
                                <ul>
                                    <li><b>Size:</b> {{ $item->Size }}</li>
                                    <li><b>Material:</b> {{ $item->Material }}</li>
                                    <li><b>Code:</b> {{ $item->Code }}</p>
                                    <li><b>In Stock:</b> {{ $item->Quantity }}</li>
                                </ul>
                                <a  href="{{ url('/client/products/specificProduct/pdf', $item->Slug) }}"><ion-icon name="download-outline"></ion-icon></a>
                            </div>
                        </div>
                    </div>
            </div>
        </form>
        <hr class="main__hr">
        @endforeach
    </div>
    <hr class="main__hr">
    <div class="main__reivew">
        <p>Reviews</p>
        <button>Write Us A Reviews</button>
    </div>
    <div class="container__featured">
        <div class="container__featured-tittle">You May Also Like</div>
        <div class="container__featured-products">
            @foreach ($ran_pro as $item)
                <a class="container__featured-products-items"
                    href="{{ url('/client/products/specificProduct', $item->Slug) }}">
                    <div style="background-image: url({{ $item->Main_IMG }})"
                        class="container__featured-products-items-img"></div>
                    <div class="container__featured-products-items-info">
                        <p>{{ $item->Name }}</p>
                        <p>${{ $item->Export_Price }}</p>
                    </div>
                </a>
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
    <script src="{{ asset('javascript/client/product.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>





    <script>
        $(document).ready(function() {
            $('#compare').each(function(index) {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    var product = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('compareProduct') }}",
                        method: "GET",
                        data: {
                            product: product,
                            _token: _token
                        },
                        success: function(data) {
                            location.reload();
                        }
                    })
                })
            })
        });
    </script>
@stop
