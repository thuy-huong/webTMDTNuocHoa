    @extends('layout')
    @section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/front_end/css/grid.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/base.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{asset('public/front_end/css/layout_login_checkout.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Hebrew:wght@100;200;300;400;500&family=Josefin+Sans:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/front_end/font/fontawesome-free-6.1.1-web/css/all.min.css')}}">
    <title>Shop nước hoa</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{URL::to('/them-khachhang')}}" method="POST">
                {{ csrf_field() }}
                <h1>Tạo tài khoản </h1>
                <input type="text" name="customer_name" placeholder="Họ và Tên" />
                <input type="email" name="customer_email" placeholder="Email" />
                <input type="password" name="customer_password" placeholder="Mật khẩu" />
                <input type="text" name="customer_phone" placeholder="Số điện thoại" />
                <input type="text" name="customer_address" placeholder="Địa chỉ" />
                <input type="hidden" name="customer_status" id="customer_status" value="1">
                <button type="submit">Đăng ký</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{URL::to('/check-login')}}" method="post">
                <?php
                
                $message = session()->get('message');
                if($message){
                    echo '<p class="text-alert"><b>'.$message.'</b></p>' ;
                    session()->put('message', null);
                }
            ?> 
            {{ csrf_field() }}
                <h1>Đăng nhập</h1>
                <input type="email" name="customer_email" placeholder="Email" />
                <input type="password" name="customer_password" placeholder="Password" />
                {{-- <a href="#">Forgot your password?</a> --}}
                <button>Đăng nhập</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');
    
        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });
    
        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>
</html>
@endsection('content')