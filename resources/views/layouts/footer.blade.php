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
                    <p>MY ACCOUNT</p>
                    <li><a href="http://127.0.0.1:8000/client/login">Sign In</a></li>
                    <li><a href="http://127.0.0.1:8000/client/login">Sign Up</a></li>
                    <li><a href="http://127.0.0.1:8000/client/wishList">My Wish List</a></li>
                    <li><a href="http://127.0.0.1:8000/client/Cart">My Cart</a></li>
                </ul>
                <ul>
                    <p>SERVICE</p>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Store Location</a></li>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Return Policy</a></li>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Item Care & Warranty</a></li>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Payment Options</a></li>
                    <li><a href="">Size Guide</a></li>
                </ul>
                <ul>
                    <p>ABOUT US</p>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Who We Are</a></li>
                    <li><a href="http://127.0.0.1:8000/client/aboutUs">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer__main-socialMedia">
                <p>FOLLOW US</p>
                <ul>
                    <li><a href=""><img style="width: 50px; height: 50px" src="{{ asset('assets/socialmedia E-project/facebook.png') }}"
                                alt="">
                            <P>Facebook</P>
                        </a>
                    </li>
                    <li><a href=""><img style="width: 50px; height: 50px" src="{{ asset('assets/socialmedia E-project/tiktok.png') }}"
                                alt="">
                            <P>Tiktok</P>
                        </a>
                    </li>
                    <li> <a href=""><img style="width: 60px; height: 60px" src="{{ asset('assets/socialmedia E-project/twitter.png') }}"
                                alt="">
                            <p> Twitter</p>
                        </a>
                    </li>
                    <li> <a href=""><img style="width: 50px; height: 50px" src="{{ asset('assets/socialmedia E-project/insta.png') }}"
                                alt="">
                            <P>Instagram</P>
                        </a>
                    </li>
                    <li><a href="https://www.youtube.com/channel/UC9cyMr1Y4M06jw3zCHWWYaw"><img style="width: 70px; height: 70px" src="{{ asset('assets/socialmedia E-project/youtube.png') }}"
                                alt="">
                            <P>Youtube</P>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer__copyrights">
            <p style="color: white">Copyright © NextTag - All Rights Reserved</p>
        </div>
    </div>
</body>

</html>
