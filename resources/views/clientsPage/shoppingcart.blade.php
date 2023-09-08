@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/checkOut.css') }}">

@stop
@section('content')
    <div class="main">
        <div class="main__title">Shopping Cart</div>
        <form action="Cart" method="POST" class="ajaxform">
            @csrf
            <div class="container">
                <div class="container__product">
                    <div class="container__product-big">
                        <div class="container__product-categories">
                            <div class="container__product-categories-product">Product</div>
                            <div class="container__product-categories-price">Price</div>
                            <div class="container__product-categories-quantity">Quantity</div>
                            <div class="container__product-categories-total">Total</div>
                            <div class="container__product-categories-button"></div>
                        </div>
                        <div class="container__product-list">
                            @foreach ($carts as $index => $item)
                                <div class="container__product-list-cart">
                                    <div class="container__product-list-cart-image">
                                        <a class="container__product-list-cart-image-img" href="">
                                            <img src="{{ $item->Main_IMG }}" style="width: 89px; height: 90px;"
                                                alt="">
                                        </a>
                                        <div class="container__product-list-cart-image-info">
                                            <div class="container__product-list-cart-info-name">{{ $item->Name }}</div>
                                            <div class="container__product-list-cart-info-cate"
                                                style="background-color: {{ $item->Color }}"></div>
                                        </div>
                                    </div>
                                    <div class="container__product-list-cart-price">${{ $item->Export_Price }}
                                    </div>

                                    <div class="container__product-list-cart-quantity">
                                        <button type="button" class="decrementQuantity"
                                            value="{{ $item->Product_Detail_ID }}">
                                            <ion-icon class="icon" name="remove-outline"></ion-icon>
                                        </button>

                                        <div class="result" max="5">{{ $item->Product_quantity }}</div>

                                        <button type="button" class="incrementQuantity"
                                            value="{{ $item->Product_Detail_ID }}">
                                            <ion-icon class="icon" name="add-outline"></ion-icon>
                                        </button>

                                        {{ csrf_field() }}

                                    </div>

                                    <div class="productSubtotal container__product-list-cart-total">
                                        ${{ $item->subtotal }}</div>
                                    <div class="container__product-list-cart-button">
                                        <a href="{{ url('/client/Cart/removefromcart', $item->Product_Detail_ID) }}">
                                            <ion-icon name="close-outline"></ion-icon>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="container__cartTotal">
                    <div class="container__cartTotal-big">
                        <div class="container__cartTotal-big2">
                            <div class="container__cartTotal-big2-tittle">Cart Totals</div>
                            <hr class="hr1">
                            <div class="container__cartTotal-big2-info">
                                <div class="container__cartTotal-big2-info-sub">
                                    <div class="container__cartTotal-big2-info-sub-left">Subtotals</div>
                                    <div class="subtotals container__cartTotal-big2-info-sub-right">${{ $subtotals }}
                                    </div>
                                </div>
                                <div class="container__cartTotal-big2-info-ship">
                                    <div class="container__cartTotal-big2-info-left">Shipping</div>
                                    <div class="ship-money container__cartTotal-big2-info-right">$5</div>
                                </div>
                                <div class="container__cartTotal-big2-info-deli">
                                    {{-- <input type="text" list="ship" id="ship" placeholder="Delivery Option" /> --}}
                                    <select name="ship" id="ship">
                                        <option value="5">Standard - $5</option>
                                        <option value="8">Fast - $8</option>
                                        <option value="12">Priority - $12</option>
                                    </select>
                                </div>
                                {{-- <div class="container__cartTotal-big2-info-address">
                                    <div class="container__cartTotal-big2-info-address-name">Address:</div>
                                    <p>Address:</p>
                                    <input type="text" Name="Adress">
                                </div> --}}
                                <div class="container__cartTotal-big2-info-give">
                                    <div class="container__cartTotal-big2-info-give-left">Address</div>
                                </div>
                                <div id="aF" class="container__cartTotal-big2-info-addr">
                                    <input type="text" placeholder="   Enter Your Address" name="Adress">
                                    @error('Adress')
                                        <small>{{ $message }}</small>
                                    @enderror
                                    {{-- <div ></div> --}}
                                </div>
                                <div class="container__cartTotal-big2-info-give">
                                    <div class="container__cartTotal-big2-info-give-left">Give Code</div>
                                    <div class="container__cartTotal-big2-info-give-right" id="discount"></div>
                                </div>
                                <div class="container__cartTotal-big2-info-code">
                                    <input id="discount-code" type="text" placeholder="   Enter Your Code"
                                        name="discount">
                                    <button type="button" id="discount-code_btn">
                                        <ion-icon alt="Enter Your Code" name="arrow-forward-outline"></ion-icon>
                                    </button>
                                    {{-- <div ></div> --}}
                                </div>

                            </div>
                            <hr class="hr1">
                            <div class="container__cartTotal-big2-totalPrice">
                                <div class="container__cartTotal-big2-totalPrice-left">Total Price</div>
                                <div class="total-price container__cartTotal-big2-totalPrice-right" name="total_price">
                                </div>
                            </div>
                            <div class="container__cartTotal-big2-button">
                                <button type="submit">Check Out</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

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
    <div class="subscribeUs">
        <div class="subscribeUs__text">
            <div class="subscribeUs__text-firstText">Subscribe To Our Newsletter</div>
            <div class="subscribeUs__text-secondText">Keep your finger on the pulse of fashion with weekly round-ups
                of
                our
                latest arrivals, upcoming launches, special promotions and trend-focused editorials.
            </div>
            <input type="text" placeholder="Enter your email address"><button>SUBSCRIBE</button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>





    <script>
        var result = document.querySelectorAll("div .result");
        var productSubtotal = document.querySelectorAll("div .productSubtotal");


        $(document).ready(function() {

            // Total Price
            var totalPrice = 0;
            var shipPrice = +$('#ship').val();
            var subtotals = +$('.subtotals').html().replace('$', '');
            var discount = $('#discount').html()
            if (discount.includes('-') || discount.includes('%')) {
                var newDiscount1 = discount.replace('-', '');
                var newDiscount2 = newDiscount1.replace('%', '');
                var newDiscount3 = subtotals * newDiscount2 / 100;
                totalPrice = subtotals - newDiscount3 + shipPrice;
            } else {
                totalPrice = subtotals + shipPrice
            }
            $('.total-price').html("$" + totalPrice);

            function calculatePriceTotal() {
                var totalPrice = 0;
                var shipPrice = +$('#ship').val();
                var subtotals = +$('.subtotals').html().replace('$', '');
                var discount = $('#discount').html();
                if (discount.includes('-') || discount.includes('%')) {
                    var newDiscount1 = discount.replace('-', '');
                    var newDiscount2 = newDiscount1.replace('%', '');
                    var newDiscount3 = subtotals * newDiscount2 / 100;
                    totalPrice = subtotals - newDiscount3 + shipPrice;
                } else {
                    totalPrice = subtotals + shipPrice
                }
                $('.total-price').html("$" + totalPrice);
            }

            // Increase Button
            $('.incrementQuantity').each(function(index) {
                $(this).on('click', function() {
                    var quantity = +result[index].innerHTML;
                    if (quantity === 5) {
                        return;
                    } else {
                        var product = $(this).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('client.shopping-cart.handle-increase-quantity') }}",
                            method: "POST",
                            data: {
                                product: product,
                                _token: _token
                            },
                            success: function(data) {
                                var hehe = JSON.parse(data);
                                result[index].innerHTML = hehe[0];
                                productSubtotal[index].innerHTML = "$" + hehe[
                                    1];
                                $('.subtotals').html("$" + hehe[2]);
                                calculatePriceTotal();
                            }
                        })
                    }
                })
            })

            // Decrease Button
            $('.decrementQuantity').each(function(index) {
                $(this).on('click', function() {
                    var quantity = +result[index].innerHTML;
                    if (quantity === 0) {
                        return;
                    } else {
                        var product = $(this).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('client.shopping-cart.handle-decrease-quantity') }}",
                            method: "POST",
                            data: {
                                product: product,
                                _token: _token
                            },
                            success: function(data) {
                                var hehe = JSON.parse(data);
                                result[index].innerHTML = hehe[0];
                                productSubtotal[index].innerHTML = "$" + hehe[
                                    1];
                                $('.subtotals').html("$" + hehe[2]);
                                calculatePriceTotal();
                            }
                        })
                    }
                })
            })

            // Ship Option
            $('#ship').on('change', function() {
                $('.ship-money').html("$" + this.value)
                calculatePriceTotal();
            });

            // Discount Code
            $('#discount-code_btn').on('click', function() {
                var discountCount = $('#discount-code').val();
                if (discountCount) {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('client.shopping-cart.get-discount-code') }}",
                        method: "POST",
                        data: {
                            discountCount: discountCount,
                            _token: _token
                        },
                        success: function(data) {
                            if (typeof data == 'object') {
                                $('#discount').css('color', 'red').html(data['error']);
                            } else {
                                $('#discount').removeAttr('style').html("-" + data + "%");
                                calculatePriceTotal();
                            }
                        }
                    })
                }
            });
        });
    </script>
@stop
