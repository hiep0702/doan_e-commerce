<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/footer.css') }}">
</head>

<body>
    <div class="footer">
        <div class="footer__main">
            <div class="footer__main-service">
                <ul>
                    <p>Tài khoản</p>
                    <li><a href="http://127.0.0.1:8000/client/login">Đăng nhập</a></li>
                    <li><a href="http://127.0.0.1:8000/client/login">Đăng ký</a></li>
                    <li><a href="http://127.0.0.1:8000/client/wishList">Danh sách yêu thích</a></li>
                    <li><a href="http://127.0.0.1:8000/client/Cart">Giỏ hàng</a></li>
                </ul>
                <ul>
                    <p>Dịch vụ</p>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Vị trí</a></li>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Chính sách hoàn trả</a></li>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Chăm sóc & Bảo hành</a></li>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Lựa chọn thanh toán</a></li>
                </ul>
                <ul>
                    <p>Về chúng tôi</p>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Thông tin</a></li>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Liên hệ</a></li>
                </ul>
            </div>
            <div class="footer__main-socialMedia">
                <p>Theo dõi chúng tôi</p>
                <ul>
                    <li><a target="_blank" href="https://www.facebook.com/trantuanhiep07"><img style="width: 50px; height: 50px" src="{{ asset('assets/socialmedia E-project/facebook.png') }}"
                                alt="">
                            <P>Facebook</P>
                        </a>
                    </li>
                    <li><a target="_blank" href="https://www.tiktok.com/@tran_tuanhiep"><img style="width: 50px; height: 50px" src="{{ asset('assets/socialmedia E-project/tiktok.png') }}"
                                alt="">
                            <P>Tiktok</P>
                        </a>
                    </li>
                    {{-- <li> <a target="_blank" href=""><img style="width: 60px; height: 60px" src="{{ asset('assets/socialmedia E-project/twitter.png') }}"
                                alt="">
                            <p> Twitter</p>
                        </a>
                    </li> --}}
                    <li> <a target="_blank" href="https://www.instagram.com/01.tth_/"><img style="width: 50px; height: 50px" src="{{ asset('assets/socialmedia E-project/insta.png') }}"
                                alt="">
                            <P>Instagram</P>
                        </a>
                    </li>
                    <li><a target="_blank" href="https://www.youtube.com/channel/UC_JtU2htQsg2grRflyFe7vg"><img style="width: 70px; height: 70px" src="{{ asset('assets/socialmedia E-project/youtube.png') }}"
                                alt="">
                            <P>Youtube</P>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer__copyrights">
            <p style="color: white">Copyright © by Trần Tuấn Hiệp</p>
        </div>
    </div>
</body>

</html>
