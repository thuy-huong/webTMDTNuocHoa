<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('public/back_end/css/layout_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('public/back_end/css/layout_catelogy.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>  
<body>
    <div class="container">
        <nav id= "nav">
            <ul>
                <li><a href="{{URL::to('/dashboard')}}" class="logo">
                    {{-- <img src="{{('public/back_end/images/logog.webp')}}" alt="logo"> --}}
                    <span class="nav-item" style="text-align: center;">
                        <?php
                            $admin_name = session()->get('tenAdmin');
                            $tenNV = session()->get('tenNhanVien');
                            if($admin_name){
                                echo $admin_name ;
                            }elseif($tenNV){
                                echo $tenNV;
                            }
                        ?> 
                    </span>    
                </a></li>
                <li><a href="{{URL::to('/dashboard')}}">
                    <i class="fa-solid fa-gauge"></i>
                    <span class="nav-item">Bảng điều khiển</span>  
                </a></li>
                
                <li><a href="{{URL::to('/danhsach-khachhang')}}">
                    <i class="fa-solid fa-user"></i> 
                    <span class="nav-item">Quản lý Khách hàng</span> 
                </a>
                </li>
                
                <li><a href="{{URL::to('/danhsach-danhMuc')}}">
                    <i class="fa-solid fa-list"></i> 
                    <span class="nav-item">Quản lý danh mục</span> 
                </a>
                    <ul>
                        <li class="submenu2"><a href="{{URL::to('/danhsach-danhMuc')}}">Danh sách danh mục</a></li>
                        <li class="submenu2"><a href="{{URL::to('/themmoi-danhmuc')}}">Thêm danh mục</a></li>
                    </ul>
                </li>
                <li><a href="{{URL::to('/danhsach-thuonghieu')}}">
                    <i class="fa-solid fa-brands fa-bandcamp"></i>
                    <span class="nav-item">Quản lý thương hiệu</span> 
                </a>
                    <ul>
                        <li class="submenu2"><a href="{{URL::to('/danhsach-thuonghieu')}}">Danh sách thương hiệu</a></li>
                        <li class="submenu2"><a href="{{URL::to('/themmoi-thuonghieu')}}">Thêm thương hiệu</a></li>
                    </ul>
                </li>
                <li><a href="{{URL::to('/danhsach-sanpham')}}">
                    <i class="fa-solid fa-tag"></i>  
                    <span class="nav-item">Quản lý sản phẩm</span>     
                </a>
                    <ul>
                            <li class="submenu2"><a href="{{URL::to('/danhsach-sanpham')}}">Danh sách sản phẩm</a></li>
                            <li class="submenu2"><a href="{{URL::to('/them-sanpham')}}">Thêm sản phẩm</a></li>
                        </ul>
                </li>
                <li><a href="{{URL::to('/danhsach-donhang')}}">
                    <i class="fa-solid fa-dolly"></i>  
                    <span class="nav-item">Quản lý đơn hàng</span>     
                </a></li>
                    <?php
                        $admin_id = session()->get('admin_id');

                        if($admin_id){
                    ?>

                    <li><a href="{{URL::to('/danhsach-nhanvien')}}">
                        <i class="fa-solid fa-address-book"></i>  
                        <span class="nav-item">Quản lý nhân viên</span>   </a>
                        <ul>
                            <li class="submenu2"><a href="{{URL::to('/danhsach-nhanvien')}}">Danh sách nhân viên</a></li>
                            <li class="submenu2"><a href="{{URL::to('/themmoi-nhanvien')}}">Thêm nhân viên</a></li>
                        </ul>
                    </li>
                    
                    <?php 
                        }
                    ?> 
                
                <li><a href="">
                    <i class="fa-solid fa-gear"></i>  
                    <span class="nav-item">Cài đặt</span>     
                </a></li>
                <li><a href="">
                    <i class="fa-solid fa-circle-question"></i> 
                    <span class="nav-item">Trợ giúp </span>     
                </a></li>
                <li><a href="{{URL::to('/logout')}}" class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>  
                    <span class="nav-item">Đăng xuất</span>     
                </a></li>
            </ul>
        </nav>
        <setion class="main">
            @yield('content')
        </setion>
    </div>
</body>
</html>