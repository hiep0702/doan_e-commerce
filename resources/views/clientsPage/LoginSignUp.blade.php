@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/LoginSignUp.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="sign-in">
            <form action="/client/login" method="post">
                @csrf
                <div class="wrapper">
                    <h1>Sign In To Your Account</h1>
                    <p>Already have an account? Welcome back!</p>
                    @if (!empty($error_login))
                        <small class="error">{{ $error_login }}</small>
                    @endif
                    <div class="form">
                        <input name="email_login" type="text" class="form-input email-sign-in" placeholder=" " />
                        <span class="form-label">Email Address</span>
                        @error('email_login')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form form-password-sign-in">
                        <input name="password_login" type="password" class="form-input password-sign-in" placeholder=" " />
                        <span class="form-label">Password</span>
                        <button type="button" class="show-password show-password-sign-in">Show</button>
                        @error('password_login')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="option">
                        <div><input class="remember-me" type="checkbox" />Remember Me</div>
                        <button>Forgot Password</button>
                    </div>
                    <button type="submit" class="sign-in-btn">SIGN IN</button>
                </div>
            </form>
        </div>
        {{-- --------------------------------------------------------- --}}
        <div class="create-account">
            <form action="/client/register" method="post">
                @csrf
                <div class="wrapper">
                    <h1>I'm New Here</h1>
                    <p>
                        Creating an account is easy. Just fill out the form, click the
                        create account button, and enjoy the benefits.
                    </p>
                    <div class="form">
                        <input name="firstname" type="text" class="form-input firstname" placeholder=" " />
                        <span class="form-label">First Name</span>
                        @error('firstname')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form">
                        <input name="lastname" type="text" class="form-input lastname" placeholder=" " />
                        <span class="form-label">Last Name</span>
                        @error('lastname')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form">
                        <input name="dob" type="date" class="form-input DOB" placeholder=" " />
                        <span class="form-label">Day Of Birth</span>
                        @error('dob')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form numberphone-form">
                        <input name="numberphone" type="" class="form-input numberphone" placeholder=" " />
                        <span class="form-label">Number Phone</span>
                        @error('numberphone')
                            <small class="error">{{ $message }}</small>
                        @enderror
                        <i class="icon-number fa-solid fa-circle-info"></i>
                    </div>
                    <div class="form">
                        <input name="email" type="text" class="form-input email" placeholder=" " />
                        <span class="form-label">Email</span>
                        @error('email')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form">
                        <input name="username" type="text" class="form-input username" placeholder=" " />
                        <span class="form-label">User Name</span>
                        @error('username')
                            <small class="error">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form password-form">
                        <input name="password" onkeyup="myFunction()" type="password" class="form-input password"
                            placeholder=" " />
                        <span class="form-label">Password</span>
                        @error('password')
                            <small class="error">{{ $message }}</small>
                        @enderror
                        <button type="button" class="show-password show-password-create">Show</button>
                    </div>

                    <div class="condition">
                        <div>
                            <span class="condition-check-password condition-succes-1"></span>
                            <small class="condition-item-1">Phải có 8 ký tự trở lên</small>
                        </div>
                        <div>
                            <span class="condition-check-password condition-succes-2"></span>
                            <small class="condition-item-2">Phải bao gồm ít nhất một số và chữ cái</small>
                        </div>
                    </div>
                    <div class="policy">
                        <p>
                            <input type="checkbox" />
                            Bằng việc chọn hộp này, bạn đồng ý nhận thông tin tự động định kỳ
                            tin nhắn văn bản tiếp thị quảng cáo và cá nhân hóa (ví dụ: giỏ hàng
                            lời nhắc) từ SUGAR tại số ô được sử dụng khi ký
                            hướng lên. Sự đồng ý không phải là điều kiện của bất kỳ giao dịch mua nào. Trả lời TRỢ GIÚP cho
                            trợ giúp và STOP để hủy bỏ. Tần số tin nhắn khác nhau. Tốc độ tin nhắn và dữ liệu
                            có thể áp dụng. Xem <a href="#">Điều kiện</a> & <a href="#">Sự riêng tư</a>.
                        </p>
                    </div>
                    <div class="policy">
                        <p>
                            <input type="checkbox" />
                            Đăng ký để nhận email SUGAR (bạn có thể rút tiền
                            đồng ý bất cứ lúc nào). Tìm hiểu chúng tôi <a href="#">Chính sách bảo mật</a> và
                            <a href="#">Liên hệ chúng tôi</a> để biết thêm chi tiết.
                        </p>
                    </div>
                    <button type="submit" class="create-account-btn">CREATE ACCOUNT</button>
                    <p class="terms-privacy">
                        SUGAR USES YOUR INFORMATION TO CREATE AND ADMINISTER YOUR
                        ACCOUNT. BY CLICKING CREATE ACCOUNT, YOU AGREE TO ABIDE BY KATE
                        SPADE <a href="#">TERMS AND CONDITIONS</a>. READ OUR
                        <a href="#">PRIVACY POLICY</a> FOR MORE DETAILS.
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src={{ asset('javascript/client/login.js') }}></script>
@stop
