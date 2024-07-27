<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="icon" href="./assets/img/logo2.png" type="image/x-icon"/> --}}
    
    <link rel="stylesheet" href="{{asset('public/front_end/css/grid.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/pro_layout.css')}}">
    <link rel="stylesheet" href="{{asset('public/front_end/css/layout_cart.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Hebrew:wght@100;200;300;400;500&family=Josefin+Sans:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/front_end/font/fontawesome-free-6.1.1-web/css/all.min.css')}}">
    <title>Shop nước hoa</title>
    <style>
        :root{
            --transition-effect: 0.25s cubic-bezier(.25,-0.59,.82,1.66) .3s;
        }
        body{
            background: #fff;
            transition: var(--transition-effect);
        }
        body.dark{
            background: #6b8896;
        }
        #wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh;
        }
        .switch-toggle{
            margin-left: 55px; 
            width: 50px;
            height: 20px;
            appearance: none;
            background: #83d8ff;
            border-radius: 26px;
            position: relative;
            cursor: pointer;
            box-shadow: inset 0px 0px 16px rgba(0, 0, 0, .3);
            transition: var(--transition-effect);
        }
        .switch-toggle::before{
            content: "";
            width: 20px;
            height: 15px;
            position: absolute;
            top: 3px;
            left: 3px;
            background: #efe2bf;
            border-radius: 50%;
            box-shadow: 0px 0px 6px rgba(0, 0, 0, .3);
            transition: var(--transition-effect);
         
        }
        .switch-toggle:checked{
            background: #749dd6;
        }
        .switch-toggle:checked:before{
            left: 30px;
        }
        img.img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="app wrapper">
        <div class="header__nav-left l-8 m-9 c-8">
            <input type="checkbox" name="" class="switch-toggle" id="light-dark">
        </div>
        <header class="header grid wide">
            <div class="header__nav row">
                <div class="header__nav-left l-8 m-9 c-8">
                </div>
                <div class="header__nav-right l-4 m-0 c-0">
                    <ul class="header__right-list">
                        <li class="header__right-item">
                            <?php
                                $customer_id = session()->get('maKhachHang');
                                $customer_name = session()->get('tenKhachHang');
                                if($customer_id!=NULL){
                                    
                            ?>
                                <a class="header__right-item-link" href="#"><i class="fa-solid fa-user"></i>
                                <span>
                                    <?php echo $customer_name;?></span> 
                                </a>
                            <?php
                            }else{
                            ?>
                             <a class="header__right-item-link" href="#"><i class="fa-solid fa-user"></i>
                                <span>My Account</span> 
                             </a>
                            <?php
                            }
                            ?>
                        </li>
                        </li>
                        <li class="header__right-item">
                            <?php
                                if($customer_id!=NULL){
                            ?>
                                 <a class="header__right-item-link" href="{{URL::to('/dangxuat-khachhang')}}">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                   Logout
                                </a>
                            <?php
                                }else{
                            ?>
                                <a class="header__right-item-link" href="{{URL::to('/dangnhap-khachhang')}}">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    Login
                                </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="strikethrough"></div>
            <div class="header__search row">
                <div class="header__search-logo col l-3 m-9 c-9">
                   
                </div>
                <div class="header__search-search col l-6 m-0 c-0">
                    <form class="header__search-search-form" action="{{URL::to('timkiem')}}" method="POST">
                        {{ csrf_field() }}
                        <input class="header__search-search-input" type="text" placeholder="Nhập tên sản phẩm cần tìm kiếm" id="search">
                        <label class="header__search-search-icon" for="search">
                            <button type="submit" class="header__search-search-icon-link" style="border: none;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </label>
                    </form>
                </div>
                <div class="header__search-tell col l-2 m-0 c-0">
                    <a class="header__search-tell-link" href="tel:(+84)99998943">
                        <img src="./assets/img/header/contact/phone.png" alt="" class="header__search-tell-img">
                        <div class="header__search-tell-text">
                            <h1 style="text-align: center;">  <i class="fa-solid fa-phone-volume"></i></h1>
                            <span>098765432</span>
                        </div>
                    </a>
                </div>
                <div class="header__search-cart col l-1 m-3 c-3">
                    <a class="header__search-cart-link" href="{{URL::to("/giohang")}}">
                        <img src="./assets/img/header/contact/cart.png" alt="" class="header__search-cart-img">   
                        <div class="header__search-cart-text">
                            <h1>Giỏ hàng</h1>
                            <span> <?php
                                $count=Cart::count();
                                echo  $count;
                            ?> item(s)</span>
                        </div>
                    </a>
                    <div class="header__search-cart-list">
                        <h1>MY CART</h1>
                        <span>Your cart is  <?php
                            $count=Cart::count();
                            echo  $count;
                        ?> items</span>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        <footer>
            <div class="copyright">
                <p>© 2024 Bản quyển này thuộc về <span> @@@</span></p>
            </div>
        </footer>
        </div>
    </div>
    <script src="{{asset('public/front_end/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var checkbox_toggle = document.getElementById('light-dark');
    checkbox_toggle.addEventListener('change', function(){
        // THêm class dark cho body
        document.body.classList.toggle('dark');
    });
</script>
</body>
</html>
