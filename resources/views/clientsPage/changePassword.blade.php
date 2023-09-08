<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotten password?</title>
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/changePW.css') }}">

</head>

<body>
    @include('sweetalert::alert')
    <div class="frm" action="">
        <div class="container">
            <form action="" id="signInForm" method="POST" class="container__signIn active">
                @csrf
                <div class="container__signIn-tittle">Find Your Password</div>
                <div class="container__signIn-text">Enter your username then we will send password to your email </div>
                <div class="container__signIn-input">
                    <div class="input-group">
                        <input placeholder="" type="text" name="user_name" autocomplete="off" class="input">
                        <label class="user-label">Username</label>
                        <small>
                            @error('user_name')
                                {{ $message }}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="container__signIn-button">
                    <button id="" type="submit">Submit</button>
                </div>
                <div class="container__signIn-change">
                    <a href="http://127.0.0.1:8000/client/login">Sign In</a>
                </div>`
            </form>
        </div>
        <div id="abc" class="slideShow">
            @foreach ($img as $item)
                <div id="formImage" class="slideShow-image show"
                    style="background-image: url({{ $item->Before_Hover_IMG }});">
                </div>
            @endforeach
        </div>
    </div>
</body>
<script src="{{ asset('javascript/client/loginNew.js') }}"></script>

</html>
