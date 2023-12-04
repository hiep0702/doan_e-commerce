@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/checkOut.css') }}">

    <style>
        .main {
            background-color: #c3dec3;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 1500px;
            margin: 0 auto;
        }

        .main div {
            margin-bottom: 20px;
        }

        .first-paragraph {
            font-size: 50px;
            /* Cỡ chữ lớn hơn */
            line-height: 1.5;
            color: #008000;
            /* Màu xanh lá */
            white-space: nowrap;
            /* Ngăn text bị xuống dòng */
        }

        .second-paragraph {
            font-size: 50px;
            /* Cỡ chữ lớn hơn */
            line-height: 1;
            color: #008000;
            /* Màu xanh lá */
            white-space: nowrap;
            /* Ngăn text bị xuống dòng */
        }
    </style>
@stop
@section('content')
    <div class="main">
        <div>
            <p class="first-paragraph">Đặt hàng thành công</p>
            <p class="second-paragraph">Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi</p>
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
            <div class="subscribeUs__text-firstText">Theo dõi chúng tôi</div>
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
