@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/aboutUs.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/subsAndScroll.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="sidebar">
            <ul>
                <h3>My Account</h3>
                <li><a href="http://127.0.0.1:8000/client/login">Sign in/Sign up</a></li>
                <li><a href="http://127.0.0.1:8000/client/wishList">My Wish List</a></li>
                <li><a href="http://127.0.0.1:8000/client/Cart">My Shopping Cart</a></li>
            </ul>
            <ul>
                <h3>Service</h3>
                <li><a href="" id="storeLocation">Store Location</a>
                <li><a href="" id="returnPolicy">Return Policy</a></li>
                <li><a href="" id="warranty">Item Care & Warranty</a></li>
                <li><a href="" id="payment">Payment Options</a></li>
            </ul>
            <ul>
                <h3>About Us</h3>
                <li><a href="">Who We Are</a></li>
                <li><a href="" id="contact">Contact Us</a></li>
            </ul>
        </div>
        <div class="mainContent">
            <div class="mainContent_service">

                <div class="mainContent_service-storeLocation">
                    <h2>Store Location</h2>
                    <div class="mainContent_service-storeLocation-info">
                        <div class="mainContent_service-storeLocation-map">
                            <div class="mainContent_service-storeLocation-map-item">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9232486533124!2d105.8189851!3d21.035756799999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0d127a01e7%3A0xab069cd4eaa76ff2!2zMjg1IMSQ4buZaSBD4bqlbiwgVsSpbmggUGjDuiwgQmEgxJDDrG5oLCBIw6AgTuG7mWkgMTAwMDAw!5e0!3m2!1svi!2s!4v1669645645002!5m2!1svi!2s"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="mainContent_service-storeLocation-location">
                            <p><b>Address: </b>285 - Doi Can Street - Ba Dinh - Ha Noi</p>
                            <p><b>Opening:</b> 8.00 Am - 10.00 Pm</p>
                        </div>
                    </div>
                </div>

                <div class="mainContent-return">
                    <h2>Return Policy</h2>
                    <div class="mainContent-return-info">
                        <p>Obviously, we want you to be completely satisfied with your purchase and will gladly accept
                            returns
                            or exchanges of unworn or defective merchandise with original packaging and tags attached up to
                            14
                            days from date shipment was received.</p>
                        <p style="color: red">Merchandise eligible for return must be unused, unworn, and in good condition
                            with
                            original hangtags
                            and packaging attached.</p>
                        <h4>How to return your item?</h4>
                        <p>1. Log into the Policy Return Portal using the email address associated with the order and your
                            order
                            number (you can find your order number in your order confirmation email or receipt with
                            purchase)
                            **check your spam folder if you did not receive an order confirmation</p>
                        <p>2. In the Returns Portal, select the item(s) you wish to return, select a reason for your return,
                            and
                            click COMPLETE RETURN.</p>
                        <p>3. Confirm your refund. This will include taxes and any discounts applied, but exclude shipping
                            costs.</p>
                        <p>4. Print your prepaid return label and return packing slip. Put the return packing slip in the
                            box
                            with your item(s) and place the return label on the box. Drop the box at your nearest PostOffice
                            or
                            shipping center.</p>
                        <p>5. If you want to exchange your item(s), follow the same steps as the return portal or contact <a
                                href="mailto:5aedeptrai@gmail.com">5aedeptrai@gmail.com</a> with any questions or special
                            requests.</p>
                        <p style="color: red">You must complete this process within 7 business days of printing your prepaid
                            return label. Your
                            label will expire with not shipped within the week of receiving</p>
                    </div>
                </div>

                <div class="mainContent-itemCareWarranty">
                    <h2>Item Care & Warranty</h2>
                    <div class="mainContent-itemCare">
                        <h4>Item Care</h4>
                        <br>
                        <h5>CLASSIC NYLON:</h5>
                        <p>A damp cloth and mild soap such as ivory soap or woolite should work to remove most dirt and
                            stains simply by wiping. Once the dirt has been lifted, be sure to wipe down the entire bag
                            quickly in order to avoid getting water spots on the fabric. Never immerse your fabric handbag
                            in water since it will delaminate the inner lining, causing it to pucker. Leather trim can also
                            erode when immersed in water.</p>
                        <h5>FABRIC:</h5>
                        <p>Each fabric used in the design of pursellet handbags is carefully selected for its
                            color, texture, durability, and beauty. Please treat these fabrics with care to extend the life
                            of your bag. We recommend warm water and mild soap on a clean cloth for removing most common
                            stains. Please be certain to thoroughly test an inconspicuous area prior to actual stain removal
                            to avoid uncontrollable variations in material reaction. Evening bags should be treated with
                            extra special care as delicate fabrics should only be cleaned by dry cleaning specialists. Never
                            immerse your fabric handbag in water since it will delaminate the inner lining causing it to
                            pucker. Leather trim can also erode when immersed in water.</p>
                        <h5>STRAW:</h5>
                        <p>Our fabric and straw handbags are considered seasonal and do tend to wear more quickly. Please
                            refer to the care tag enclosed to help you keep it in tip-top condition. We suggest stowing your
                            handbag away from direct sunlight and heat, stuffed with tissue and stored in its dust bag when
                            not in use. Try to avoid crowding your handbag when it is in storage to help maintain its shape,
                            and to prevent delicate straws from breaking.</p>
                        <h5>LEATHER CARE:</h5>
                        <p>The leather used in the design of Kate Spade New York handbags is specially chosen from the
                            finest tanneries in Italy and Asia. Most of our leathers have been treated and are water and
                            scratch resistant. Should your handbag become wet, wipe gently dry with a soft cloth. For
                            regular cleaning, a damp cloth and mild leather cream may be applied.</p>
                    </div>
                    <div class="mainContent-warranty">
                        <h4>Warranty</h4>
                        <p>Enjoy a one year warranty on our handbags, baby bags, and small goods. For any manufacturing
                            defects within this timeframe, we are happy to assist!</p>
                        <p>We invite you to bring your item back to one of our shops. If you do not have a shop near you,
                            please contact our customer service team in your region. If you choose to contact customer
                            service via e-mail, please include:
                        </p>
                        <p style="color: red">1: Style number (can be found on the white tag inside the product)</p>
                        <p style="color: red">2: Photos of the item clearly showing the problem</p>
                        <p style="color: red">3: A copy of the proof of purchase (original receipt, pack slip, or credit
                            card statement)</p>
                    </div>
                </div>

                <div class="mainContent-payment">
                    <h2>Payment Options</h2>
                    <div class="mainContent-payment-info">
                        <h4>PAYPAL:</h4>
                        <p>You can use paypal to pay for your order on Pursellet.com. Paypal enables you to securely send
                            payments online with your credit card, debit card, bank account, or paypal account balance. Your
                            credit card and bank numbers are never seen by us, plus you're 100% protected against
                            unauthorized
                            payments sent from your account. Paypal customer service representatives are available to assist
                            you
                            at 0396437884</p>
                        <h4>BILLING INFORMATION:</h4>
                        <p>For your security, your billing name, address, and phone number must match that of the credit
                            card
                            used for payment. We reserve the right to cancel any order that does not match these criteria.
                        </p>
                    </div>
                </div>
                <div class="mainContent-aboutUs">
                    <h2>About Us</h2>
                    <div class="mainContent-aboutUs-info">
                        <h4>Who We Are</h4>
                        <p>since our launch in 2022, we’ve always stood for optimistic femininity.
                            today we’re a global life and style house filled with handbags.

                            we value thoughtful details. we think a layer of polished ease looks (and feels) so chic.
                            and to us, modern, sophisticated colors make a personal style statement all their own.

                            it’s these founding principles that define our unique style. we like that our style is
                            synonymous
                            with joy.

                            Pursellet york is part of the tapestry house of brands.</p>
                        <h4>Contact Us</h4>
                        <div class="mainContent-aboutus-contactus">
                            <p>Give Us A Call! : 0396437884</p>
                            <p>Email Us At: <a href="mailto:Pursellet@gmail.com">Pursellet@gmail.com</a></p>
                        </div>
                        <div class="scrollBackToTop">
                            <button id="scrollUp">
                                <ion-icon name="chevron-up-outline"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('javascript/client/aboutUs.js') }}"></script>
    <script src="{{ asset('javascript/client/scrollUp.js') }}"></script>
@stop
