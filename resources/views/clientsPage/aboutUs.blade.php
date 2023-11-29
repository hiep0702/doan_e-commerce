@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/aboutUs.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/subsAndScroll.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="sidebar">
            <ul>
                <h3>Tài khoản</h3>
                <li><a href="{{ route('client.login') }}">Đăng nhập/Đăng ký</a></li>
                <li><a href="{{ route('wishList') }}">Sản phẩm yêu thích</a></li>
                <li><a href="{{ route('myshoppingcart') }}">Giỏ hàng</a></li>
            </ul>
            <ul>
                <h3>Dịch vụ</h3>
                <li><a href="" id="storeLocation">Vị trí</a>
                <li><a href="" id="returnPolicy">Chính sách hoàn trả</a></li>
                <li><a href="" id="warranty">Chăm sóc & Bảo hành</a></li>
                <li><a href="" id="payment">Lựa chọn thanh toán</a></li>
            </ul>
            <ul>
                <h3>Về chúng tôi</h3>
                <li><a href="">Thông tin</a></li>
                <li><a href="" id="contact">Liên hệ</a></li>
            </ul>
        </div>
        <div class="mainContent">
            <div class="mainContent_service">

                <div class="mainContent_service-storeLocation">
                    <h2>Địa chỉ cửa hàng</h2>
                    <div class="mainContent_service-storeLocation-info">
                        <div class="mainContent_service-storeLocation-map">
                            <div class="mainContent_service-storeLocation-map-item">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1970.7378937962746!2d106.39622866228599!3d20.460951313236492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135fba15b43f655%3A0x93fe931a89eb56b2!2zQ-G7rWEgSMOgbmcgSOG6o2kgSG_DoGk!5e1!3m2!1sen!2s!4v1700060165165!5m2!1sen!2s"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="mainContent_service-storeLocation-location">
                            <p><b>Địa chỉ: </b>Tây Sơn - Kiến Xương - Thái Bình</p>
                            <p><b>Thời gian mở cửa:</b> 8.00 Am - 10.00 Pm</p>
                        </div>
                    </div>
                </div>

                <div class="mainContent-return">
                    <h2>Chính sách hoàn trả</h2>
                    <div class="mainContent-return-info">
                        <p>Rõ ràng, chúng tôi muốn bạn hoàn toàn hài lòng với giao dịch mua hàng của mình và sẽ sẵn lòng
                            chấp nhận
                            trả lại
                            hoặc trao đổi hàng hóa chưa qua sử dụng hoặc bị lỗi có bao bì gốc và thẻ gắn liền với
                            14
                            ngày kể từ ngày nhận được lô hàng.</p>
                        <p style="color: red">Hàng hóa đủ điều kiện để trả lại phải chưa qua sử dụng, chưa qua sử dụng và
                            trong tình trạng tốt
                            với
                            thẻ treo gốc
                            và bao bì kèm theo.</p>
                        <h4>Làm thế nào để trả lại hàng của bạn?</h4>
                        <p>1. Đăng nhập vào Cổng thông tin hoàn trả chính sách bằng địa chỉ email được liên kết với đơn đặt
                            hàng và
                            đặt hàng
                            (bạn có thể tìm thấy số đơn đặt hàng của mình trong email xác nhận đơn hàng hoặc biên nhận với
                            mua)
                            **kiểm tra thư mục thư rác nếu bạn không nhận được xác nhận đơn hàng</p>
                        <p>Trong Cổng Trả hàng, chọn (các) mặt hàng bạn muốn trả lại, chọn lý do trả lại,
                            Và
                            nhấp vào HOÀN THÀNH TRẢ LẠI.</p>
                        <p>3. Xác nhận khoản tiền hoàn lại của bạn. Điều này sẽ bao gồm thuế và bất kỳ khoản giảm giá nào
                            được áp dụng, nhưng không bao gồm phí vận chuyển
                            chi phí.</p>
                        <p>4. In nhãn trả lại trả trước và phiếu đóng gói trả lại. Đặt phiếu đóng gói trả lại vào
                            hộp
                            với (các) mặt hàng của bạn và dán nhãn trả lại lên hộp. Thả hộp tại Bưu điện gần nhất
                            hoặc
                            trung tâm vận chuyển.</p>
                        <p>5. Nếu bạn muốn đổi (các) mặt hàng của mình, hãy làm theo các bước tương tự như cổng trả lại hoặc
                            liên hệ<a href="mailto:tuanhiep0702@gmail.com"> tuanhiep0702@gmail.com</a> với bất kỳ câu hỏi
                            hoặc đặc biệt
                            yêu cầu.</p>
                        <p style="color: red">Bạn phải hoàn tất quy trình này trong vòng 7 ngày làm việc kể từ khi in thẻ
                            trả trước của mình
                            nhãn trả lại. Của bạn
                            nhãn sẽ hết hạn nếu không được vận chuyển trong vòng tuần kể từ khi nhận được</p>
                    </div>
                </div>

                <div class="mainContent-itemCareWarranty">
                    <h2>Chăm sóc & Bảo hành</h2>
                    <div class="mainContent-itemCare">
                        <h4>Chăm sóc sản phẩm</h4>
                        <br>
                        <h5>NYLON:</h5>
                        <p>Một miếng vải ẩm và xà phòng nhẹ như xà phòng ngà hoặc len sẽ có tác dụng loại bỏ hầu hết bụi bẩn
                            và
                            vết bẩn chỉ đơn giản bằng cách lau. Khi bụi bẩn đã được loại bỏ, hãy nhớ lau sạch toàn bộ túi
                            nhanh chóng để tránh để nước đọng lại trên vải. Không bao giờ ngâm giày vải của bạn
                            trong nước vì nó sẽ làm bong tróc lớp lót bên trong, khiến nó bị nhăn. Viền da cũng có thể
                            bị ăn mòn khi nhúng vào nước.</p>
                        <h5>VẢI VÓC:</h5>
                        <p>Mỗi loại vải được sử dụng trong thiết kế giày đều được lựa chọn cẩn thận
                            màu sắc, kết cấu, độ bền và vẻ đẹp. Hãy xử lý các loại vải này cẩn thận để kéo dài tuổi thọ
                            của túi của bạn. Chúng tôi khuyên bạn nên dùng nước ấm và xà phòng nhẹ trên một miếng vải sạch
                            để loại bỏ những vết bẩn thông thường nhất.
                            vết ố. Hãy chắc chắn kiểm tra kỹ lưỡng khu vực khó nhìn thấy trước khi loại bỏ vết bẩn thực sự
                            để tránh những biến đổi không kiểm soát được trong phản ứng vật chất. Túi buổi tối nên được xử
                            lý bằng
                            sự chăm sóc đặc biệt hơn vì các loại vải mỏng manh chỉ nên được làm sạch bởi các chuyên gia giặt
                            khô. Không bao giờ
                            ngâm giày vải của bạn vào nước vì nó sẽ làm bong tróc lớp lót bên trong khiến nó bị bong ra
                            nhăn nheo. Viền da cũng có thể bị ăn mòn khi ngâm trong nước.</p>
                        <h5>RẠ:</h5>
                        <p>Giày bằng vải và rạ của chúng tôi được coi là theo mùa và có xu hướng mòn nhanh hơn. Vui lòng
                            Hãy tham khảo thẻ bảo quản kèm theo để giúp bạn giữ nó ở trạng thái tốt nhất. Chúng tôi khuyên
                            bạn nên cất gọn
                            giày tránh xa ánh nắng trực tiếp và nhiệt độ, nhét khăn giấy và bảo quản trong túi đựng bụi khi
                            không được sử dụng. Cố gắng tránh nhét đầy giày của bạn khi cất giữ để giúp duy trì hình dạng
                            của nó,
                            và để ngăn ngừa ống hút mỏng manh bị gãy.</p>
                        <h5>CHĂM SÓC DA:</h5>
                        <p>Da được sử dụng trong thiết kế giày được lựa chọn đặc biệt từ
                            xưởng thuộc da tốt nhất ở Ý và Châu Á. Hầu hết da của chúng tôi đã được xử lý và có nước và
                            khả năng chống xước. Nếu giày của bạn bị ướt, hãy lau khô nhẹ nhàng bằng vải mềm. Vì
                            vệ sinh thường xuyên, có thể bôi một miếng vải ẩm và kem dưỡng da nhẹ.</p>
                    </div>
                    <div class="mainContent-warranty">
                        <h4>Bảo hành</h4>
                        <p>Tận hưởng bảo hành một năm cho giày và hàng hóa nhỏ của chúng tôi. Đối với bất kỳ hoạt động sản
                            xuất nào
                            khiếm khuyết trong khung thời gian này, chúng tôi rất sẵn lòng hỗ trợ!</p>
                        <p>Chúng tôi mời bạn mang sản phẩm của bạn trở lại một trong các cửa hàng của chúng tôi. Nếu bạn
                            không có cửa hàng gần bạn,
                            vui lòng liên hệ với nhóm dịch vụ khách hàng của chúng tôi trong khu vực của bạn. Nếu bạn chọn
                            liên hệ với khách hàng
                            dịch vụ qua e-mail, vui lòng bao gồm:
                        </p>
                        <p style="color: red">1: Số kiểu dáng (có thể tìm thấy trên thẻ màu trắng bên trong sản phẩm)</p>
                        <p style="color: red">2: Hình ảnh của mặt hàng cho thấy rõ vấn đề</p>
                        <p style="color: red">3: Một bản sao bằng chứng mua hàng (biên lai gốc, phiếu đóng gói hoặc tín
                            dụng)</p>
                    </div>
                </div>

                <div class="mainContent-payment">
                    <h2>Các lựa chọn thanh toán</h2>
                    <div class="mainContent-payment-info">
                        <h4>PAYPAL:</h4>
                        <p>Bạn có thể sử dụng paypal để thanh toán cho đơn hàng của mình trên Sugar. Paypal cho phép
                            bạn gửi an toàn
                            thanh toán trực tuyến bằng thẻ tín dụng, thẻ ghi nợ, tài khoản ngân hàng hoặc số dư tài khoản
                            paypal của bạn. Của bạn
                            Chúng tôi không bao giờ nhìn thấy số thẻ tín dụng và số ngân hàng, ngoài ra bạn được bảo vệ 100%
                            khỏi
                            không được phép
                            thanh toán được gửi từ tài khoản của bạn. Đại diện dịch vụ khách hàng của Paypal luôn sẵn sàng
                            hỗ trợ
                            Bạn
                            tại 0363251199</p>
                        <h4>THÔNG TIN THANH TOÁN:</h4>
                        <p>Để bảo mật cho bạn, tên thanh toán, địa chỉ và số điện thoại của bạn phải khớp với tên tín dụng
                            Thẻ
                            dùng để thanh toán. Chúng tôi có quyền hủy bất kỳ đơn hàng nào không đáp ứng các tiêu chí này.
                        </p>
                    </div>
                </div>
                <div class="mainContent-aboutUs">
                    <h2>Về chúng tôi</h2>
                    <div class="mainContent-aboutUs-info">
                        <h4>Thông tin</h4>
                        <p>Kể từ khi ra mắt vào năm 2022, chúng tôi luôn theo đuổi thoải mái và phóng khoáng.

                            chúng tôi đánh giá cao những chi tiết chu đáo. chúng tôi nghĩ rằng một lớp trang trí bóng bẩy
                            trông (và có cảm giác) rất sang trọng.
                            và đối với chúng tôi, những màu sắc hiện đại, tinh tế tạo nên phong cách riêng của mỗi người.

                            chính những nguyên tắc sáng lập này đã xác định phong cách độc đáo của chúng tôi. chúng tôi
                            thích phong cách của chúng tôi là
                            đồng nghĩa
                            cùng với sự vui mừng.

                            Sugar là một phần của các thương hiệu giày nổi tiếng.</p>
                        <h4>Liên hệ</h4>
                        <div class="mainContent-aboutus-contactus">
                            <p>Hãy gọi cho chúng tôi! : 0363251199</p>
                            <p>Gửi email cho chúng tôi theo địa chỉ: <a href="mailto:Sugar@gmail.com">Sugar@gmail.com</a>
                            </p>
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
