@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/checkOut.css') }}">

@stop
@section('content')
    <div class="main">
        <div class="main__title">Giỏ hàng</div>
        <form action="Cart" method="POST" class="ajaxform">
            @csrf
            <div class="container">
                <div class="container__product">
                    @if (Session::has('success_message'))
                        <div class="alert alert-success">
                            {{ Session::get('success_message') }}
                        </div>
                    @endif
                    <div class="container__product-big">
                        <div class="container__product-categories">
                            <div class="container__product-categories-product">Sản phẩm</div>
                            <div class="container__product-categories-price">Giá</div>
                            <div class="container__product-categories-quantity">Giày có sẵn</div>
                            <div class="container__product-categories-quantity">Số lượng</div>
                            <div class="container__product-categories-total">Tổng tiền</div>
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
                                    <div class="container__product-list-cart-price">
                                        {{ number_format($item->Export_Price, 0, ',', '.') }}
                                    </div>
                                    <div class="container__product-list-cart-price">{{ $item->Quantity }}
                                    </div>

                                    <div class="container__product-list-cart-quantity">
                                        <button type="button" class="decrementQuantity"
                                            value="{{ $item->Product_Detail_ID }}">
                                            <ion-icon class="icon" name="remove-outline"></ion-icon>
                                        </button>

                                        <div class="result" max="25">{{ $item->Product_quantity }}</div>

                                        <button type="button" class="incrementQuantity"
                                            value="{{ $item->Product_Detail_ID }}">
                                            <ion-icon class="icon" name="add-outline"></ion-icon>
                                        </button>

                                        {{ csrf_field() }}

                                    </div>

                                    <div class="productSubtotal container__product-list-cart-total">
                                        {{ number_format($item->subtotal, 0, ',', '.') }}</div>
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
                            <div class="container__cartTotal-big2-tittle">Tổng hàng</div>
                            <hr class="hr1">
                            <div class="container__cartTotal-big2-info">
                                <div class="container__cartTotal-big2-info-sub">
                                    <div class="container__cartTotal-big2-info-sub-left">Giá thành sản phẩm</div>
                                    <div class="subtotals container__cartTotal-big2-info-sub-right">{{ $subtotals }}
                                    </div>
                                </div>
                                <div class="container__cartTotal-big2-info-ship">
                                    <div class="container__cartTotal-big2-info-left">Phí ship</div>
                                    <div class="ship-money container__cartTotal-big2-info-right">15.000</div>
                                </div>
                                <div class="container__cartTotal-big2-info-deli">
                                    <select name="ship" id="ship">
                                        <option value="15000">Tiêu chuẩn - 15.000</option>
                                        <option value="30000">Nhanh - 30.000</option>
                                        <option value="45000">Hỏa tốc - 45.000</option>
                                    </select>
                                </div>
                                <div class="container__cartTotal-big2-info-give">
                                    <div class="container__cartTotal-big2-info-give-left">Địa chỉ</div>
                                </div>
                                <div id="aF" class="container__cartTotal-big2-info-addr">
                                    <input type="text" placeholder="   Nhập địa chỉ ..." name="Adress" id="address1">
                                    @error('Adress')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="container__cartTotal-big2-info-give">
                                    <div class="container__cartTotal-big2-info-give-left">Mã giảm giá</div>
                                    <div class="container__cartTotal-big2-info-give-right" id="discount"></div>
                                </div>
                                <div class="container__cartTotal-big2-info-code">
                                    <input id="discount-code" type="text" placeholder="   Nhập mã giảm giá ..."
                                        name="discount">
                                    <button type="button" id="discount-code_btn">
                                        <ion-icon alt="Enter Your Code" name="arrow-forward-outline"></ion-icon>
                                    </button>
                                </div>

                            </div>
                            <hr class="hr1">
                            <div class="container__cartTotal-big2-totalPrice">
                                <div class="container__cartTotal-big2-totalPrice-left">Tổng tiền</div>
                                <div class="total-price container__cartTotal-big2-totalPrice-right" name="total_price">
                                </div>
                            </div>
                            <div class="container__cartTotal-big2-button">
                                <button type="submit">Thanh toán tiền mặt</button>
                            </div>
                        </form>
                            <form action="{{ route('vnpay_payment') }}" method="post" id="vnpayForm">
                                @csrf
                                <div class="container__cartTotal-big2-button">
                                    <div hidden>
                                        <input type="text" id="address2" name="address">
                                        <input type="text" name="total" class="total-price-input">
                                    </div>
                                    <button  style="background-color: sandybrown;" type="submit" name="redirect" id="totalValue">Thanh toán bằng vnpay</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        

    </div>
    </div>
    </div>
    <div class="container__featured">
        <div class="container__featured-tittle">Gợi ý sản phẩm</div>
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
            <div class="subscribeUs__text-firstText">Đăng ký hội viên</div>
            <div class="subscribeUs__text-secondText">Luôn theo dõi nhịp đập của thời trang hàng tuần.
                Sản phẩm mới nhất, sản phẩm sắp ra mắt, chương trình khuyến mãi đặc biệt và các sản phẩm tập trung vào xu
                hướng.
            </div>
            <input type="text" placeholder="Enter your email address"><button>SUBSCRIBE</button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
        var result = document.querySelectorAll("div .result");
        var productSubtotal = document.querySelectorAll("div .productSubtotal");

        var addressInputForm1 = document.getElementById('address1');
        var addressInputForm2 = document.getElementById('address2');
        addressInputForm1.addEventListener('input', function() {
            // Sao chép giá trị từ input của form 1 vào input của form 2
            addressInputForm2.value = addressInputForm1.value;
        });


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
            // $('.total-price').html(totalPrice + " VND");
            $('.total-price').html(totalPrice.toLocaleString('vi-VN'));


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
                // $('.total-price').html(totalPrice + " VND");
                $('.total-price').html(totalPrice.toLocaleString('vi-VN'));

                $('.total-price-input').val(totalPrice);

            }

            $('button[name="redirect"]').on('click', function(event) {
                // event.preventDefault();

                // Tính toán tổng tiền lại trước khi chuyển đến trang thanh toán
                calculatePriceTotal();

                // Thực hiện các hành động khác, ví dụ chuyển hướng đến trang thanh toán
                $('#vnpayForm').submit(); // Gửi form đến trang thanh toán VNPAY
            });

            // Increase Button
            $('.incrementQuantity').each(function(index) {
                $(this).on('click', function() {
                    var quantity = +result[index].innerHTML;
                    if (quantity === 25) {
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
                                productSubtotal[index].innerHTML = hehe[
                                    1];
                                $('.subtotals').html(hehe[2]);
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
                                productSubtotal[index].innerHTML = hehe[
                                    1];
                                $('.subtotals').html(hehe[2]);
                                calculatePriceTotal();
                            }
                        })
                    }
                })
            })

            // Ship Option
            $('#ship').on('change', function() {
                $('.ship-money').html(this.value)
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
