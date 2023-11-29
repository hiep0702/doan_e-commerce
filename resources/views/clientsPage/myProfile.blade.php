@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/profile.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@stop
@section('content')
    @csrf
    <div id="showOff" class="container ">
        <div class="container__info">
            <div class="container__info-top">
                <div class="container__info-top-avatar ">
                    @if ($user[0]->Avatar !== null)
                        <div class="container__info-top-avatar-img"
                            style="background-image: url('{{ asset('images/avatar/' . $user[0]->Avatar) }}')">
                        @else
                            <div class="container__info-top-avatar-img"
                                style="background-image: url('{{ asset('images/avatar/GOp5a-421-4212341_default-avatar-svg-h.jpg') }}')">
                    @endif
                    <div class="container__info-top-avatar-img-change">
                        <button type="button" id="changeAvatar">
                            Thay ảnh
                        </button>
                    </div>
                </div>

            </div>
            <div class="container__info-top-username">
                <div class="username">{{ $user[0]->username }}</div>
                <div class="usercode">{{ $user[0]->Code }}</div>
            </div>
            <div class="container__info-top-button">
                <button id="showMenu">
                    <ion-icon name="create-outline"></ion-icon>
                </button>
            </div>
            <div id="menu" class="container__info-top-menu ">
                <button id="edit">Sửa thông tin</button>
                <button id="change">Đổi mật khẩu</button>
            </div>
            <form method="post" id="upload_form" class="formAvatar" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="formAvatar__change">
                    <ion-icon name="image-outline" id="imageChange"></ion-icon>
                    <div class="textChoose">Chọn ảnh</div>
                    <input type="file" name="select_file" id="select_file">
                </div>

                <button type="submit" id="upload" name="upload" value="submit">Xác nhận</button>
                <div class="alert" id="message" style="display: none"></div>
            </form>
        </div>
        <div class="container__info-details">
            <table>
                @if (!empty($user->Rank))
                    <tr>
                        <th>Thành viên</th>
                        <td>{{ $user->Rank }}</td>
                    </tr>
                    <tr>
                        <th>Họ:</th>
                        <td>{{ $user->First_Name }}</td>
                    </tr>
                    <tr>
                        <th>Tên:</th>
                        <td>{{ $user->Last_Name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $user->Email }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
                        <td>{{ $user->Number_Phone }}</td>
                    </tr>
                    <tr>
                        <th>Ngày sinh:</th>
                        <td>{{ $user->Dob }}</td>
                    </tr>
                @else
                    <tr>
                        <th>Thành viên</th>
                        <td>{{ $user[0]->Rank }}</td>
                    </tr>
                    <tr>
                        <th>Họ:</th>
                        <td>{{ $user[0]->First_Name }}</td>
                    </tr>
                    <tr>
                        <th>Tên:</th>
                        <td>{{ $user[0]->Last_Name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $user[0]->Email }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
                        <td>{{ $user[0]->Number_Phone }}</td>
                    </tr>
                    <tr>
                        <th>Ngày sinh:</th>
                        <td>{{ $user[0]->Dob }}</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    <div class="container__history">
        <div class="container__history-title">
            <p>Lịch sử mua hàng</p>
        </div>
        <div class="container__history-list">
            @if (!empty($user[0]->Order_Code))
                @foreach ($user as $user)
                    <A class="container__history-list-item" href="{{ url('client/orders', $user->Order_Code) }}">
                        <div class="container__history-list-item-title">
                            <div class="container__history-list-item-title-userCode">{{ $user->Order_Code }}</div>
                            <div class="container__history-list-item-title-date">{{ $user->created_at }}</div>
                        </div>
                        <div class="container__history-list-item-content">
                            <div class="container__history-list-item-content-status">
                                @if ($user->Status == 'Pending')
                                    <div class="container__history-list-item-content-status-color"
                                        style="background-color: rgb(5, 150, 150);"></div>
                                @elseif ($user->Status == 'Done')
                                    <div class="container__history-list-item-content-status-color"
                                        style="background-color: #28a745;"></div>
                                @else
                                    <div class="container__history-list-item-content-status-color"
                                        style="background-color: #6c757d;"></div>
                                @endif
                                <div class="container__history-list-item-content-status-text">{{ $user->Status }}
                                </div>
                            </div>
                            <div class="container__history-list-item-content-details">
                                <div class="container__history-list-item-content-details-quantity">
                                    <div>Tổng số lượng</div>
                                    <div>{{ $user->Total_Quantity }}</div>
                                </div>
                                <div class="container__history-list-item-content-details-totalPrice">
                                    <div>Tổng tiền</div>
                                    <div>{{  number_format($user->Total_Price, 0, ',', '.') }}</div>
                                </div>
                            </div>
                        </div>
                    </A>
                @endforeach
            @endif
        </div>
    </div>
    </div>
    <form id="showEdit" class="container__edit ">
        <div class="editProfile">
            <div class="editProfile__title">Sửa thông tin</div>
            <div class="profile editProfile__content">
                {{ csrf_field() }}
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                @if (!empty($user->First_Name))
                    <input id="firstname" type="text" value="{{ $user->First_Name }}" placeholder="  Nhập họ">
                    <input id="lastname" type="text" value="{{ $user->Last_Name }}" placeholder="  Nhập tên">
                    <input id="email" type="text" value="{{ $user->Email }}" placeholder="  Email">
                    <input id="dob" type="date" value="{{ $user->Dob }}" placeholder="  DOB">
                    <input id="phone_number" type="text" value="{{ $user->Number_Phone }}" placeholder="  Nhập số điện thoại">
                @else
                    <input id="firstname" type="text" value="{{ $user[0]->First_Name }}" placeholder="  Nhập họ">
                    <input id="lastname" type="text" value="{{ $user[0]->Last_Name }}" placeholder="  Nhập tên">
                    <input id="email" type="text" value="{{ $user[0]->Email }}" placeholder="  Email">
                    <input id="dob" type="date" value="{{ $user[0]->Dob }}" placeholder="  DOB">
                    <input id="phone_number" type="text" value="{{ $user[0]->Number_Phone }}"
                        placeholder="  Nhập số điện thoại">
                @endif
                <button id="btn" type="button">Lưu</button>

            </div>
            <button id="offEdit">
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>
    </form>
    <form id="showChange" class="container__edit" action="{{ route('client-change-password') }}">
        @csrf
        <div class="editProfile">
            <div class="editProfile__title">Đổi mật khẩu</div>
            <div class="profile editProfile__content">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <input id="" type="password" value="" placeholder="  Nhập mật khẩu hiện tại"
                    name="current_pass">
                <small>
                    @error('current_pass')
                        {{ $message }}
                    @enderror
                </small>
                <input id="" type="password" value="" placeholder="  Nhập mật khẩu mới" name="new_pass">
                <small>
                    @error('new_pass')
                        {{ $message }}
                    @enderror
                </small>
                <input id="" type="password" value="" placeholder="  Nhập lại mật khẩu"
                    name="Cnew_pass">
                <small>
                    @error('Cnew_pass')
                        {{ $message }}
                    @enderror
                </small>
                <button id="" type="submit">Lưu</button>
            </div>
            <button id="offChange" type="">
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>
    </form>

    <script src="{{ asset('javascript/client/profile.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src='https://cdn.jsdelivr.net/jquery.cloudinary/1.0.18/jquery.cloudinary.js' type='text/javascript'></script>
    <script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            // Edit Profile
            $('#btn').click(function() {
                var firstname = $('#firstname').val()
                var lastname = $('#lastname').val()
                var email = $('#email').val()
                var dob = $('#dob').val()
                var phoneNumber = $('#phone_number').val()
                var _token = $('input[name="_token"]').val()
                $.ajax({
                    url: "{{ route('client.edit-profile') }}",
                    method: "POST",
                    data: {
                        firstname: firstname,
                        lastname: lastname,
                        email: email,
                        dob: dob,
                        phoneNumber: phoneNumber,
                        _token: _token
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            printErrorMsg();
                            alert(data.success);
                            location.reload();
                        } else {
                            printErrorMsg(data.error);
                        }
                        // console.log(data);
                    }
                })
            })

            // Edit Profile Message
            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li style="color:red">' + value + '</li>');
                });
            }

            var avatar = document.getElementsByClassName('uploaded_image');
            // Edit Avatar
            $('#upload_form').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('client.edit-avatar') }}",
                    method: "POST",
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        $('#message').css('display', 'block');
                        $('#message').html(data.message);
                        $('#message').addClass(data.class_name);
                        $(".container__info-top-avatar-img").css("background-image", 'url(' +
                            data.avatar + ')');
                        location.reload();
                    }
                })
            })
        })
    </script>
@stop
