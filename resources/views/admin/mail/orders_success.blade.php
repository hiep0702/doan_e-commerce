<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: "Inter", sans-serif;
        }

        .container {
            background: linear-gradient(90deg, #F63D68 0%, #FEA3B4 100%, #C9687A 100%);
            padding: 50px;
            max-width: 500px;
            margin: 0 auto;
            margin-top: 50px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 24px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 170px;
            margin-left: -325px;
        }

        h2 {
            color: #ffffff;
        }

        p {
            color: #ffffff;
            line-height: 1.5;
        }

        .password-container {
            background-color: #ffffff;
            padding: 0px 10px;
            margin-bottom: 20px;
            border-radius: 10px;
            display: inline-block;
        }


        .password {
            color: #F63D68;
            font-weight: bold;
            padding: inherit;
        }

        .footer {
            /* Căn giữa theo chiều ngang */
            display: flex;
            justify-content: center;
        }

        .johnny-div {
            /* Căn giữa theo chiều dọc */
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .footer a {
            color: #ffffff;
            text-decoration: none;
            padding-left: 6px;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .img-icon {
            width: 120px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 style=" color: #ffffff;">S U G A R</h1>
        </div>
        <h2>Xin chào!</h2>
        <p>Chúng tôi xác nhận rằng đơn hàng của bạn đã được tạo thành công.</p>

        <p>Thông tin đơn hàng:</p>
        <ul style=" color: #ffffff;">
            <li>Mã đơn hàng: {{ $order->Code }}</li>
            <li>Tên khách hàng: {{ $order->First_Name }} {{ $order->Last_Name }}</li>
            <li>Tài khoản: {{ $order->username }}</li>
            <li>Số điện thoại: {{ $order->Number_Phone }}</li>
            <li>Số tiền: {{ number_format($order->Total_Paid, 0, ',', '.') }} &#8363;</li>
            <li>Địa chỉ: {{ $order->Location }}</li>
            <li>Thời gian: {{ $order->created_at }}</li>
        </ul>

        <br><br>

        <p style="text-align:center;">Pháp lý | Bảo mật | Điều kiện & Điều khoản</p>

        <p style="text-align:center;">Email này được gửi đến những thành viên đã đăng ký tham gia nhận thông tin.</p>

        <p style="text-align:center;">
            Ⓒ 2019-2023 Trần Tuấn Hiệp.
    
            * Vui lòng không trả lời thư điện tử này
        </p>
         
        </p>
        <div class="footer">
            <div class="johnny-div">
                <a href="https://doan-e-commerce-0efd69fb92e0.herokuapp.com/client/home"><u>Bấm vào đây để trở về website !!!</u></a>
            </div>
        </div>
    </div>


</body>

</html>