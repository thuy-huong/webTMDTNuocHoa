@extends('layout')
@section('content')
<div class="container grid wide" >
    <section class="myMainMenu">
        <nav class="container">
            <ul id="main-menu">
                <li><a href="{{URL::to('/trang-chu')}}"> 
                    <i class="slide1__content-sidebar-item-icon fa-solid fa-house"></i>
                    TRANG CHỦ
                </a></li>
                <li><a href="{{URl::to('/sanpham')}}">SẢN PHẨM</a>
                    <ul class="sub-menu">
                        @forEach( $cate as $key =>$cate)
                            <li><a href="{{URL::to('/sanpham-danhmuc/'.$cate->maDanhMuc)}}">{{$cate->tenDanhMuc}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href=""><i class="slide1__category-header-icon fa-solid fa-bars-staggered"></i>THƯƠNG HIỆU</a>
                    <ul class="sub-menu">
                        @forEach( $brand as $key => $brand)
                            <li><a href="{{URL::to('/sanpham-thuonghieu/'.$brand->maThuongHieu)}}">{{$brand->tenThuongHieu}}</a></li>
                        @endforeach
                    </ul>
                </li>
              
                </li>
                <li><a href="#">
                    <i class="slide1__content-sidebar-item-icon fa-solid fa-mug-hot"></i>
                    VỀ CHÚNG TÔI
                </a></li>
                <li><a href="#">LIÊN HỆ</a></li>
            </ul>
        </nav>   
    </section>
    <div class="container mt-4" style="height: 400px">
        <h4 style="text-align: center;
        padding-top: 60px;">Cảm ơn bạn đã đặng hàng, chúng tôi sẽ liên hệ với bạn sớm nhất.</h4>
        <a href="{{URL::to('/sanpham')}}" class="btn btn-shopping"><i class="fa fa-arrow-left"
         aria-hidden="true"></i>&nbsp;Tiếp tục mua sắm</a>
     </div>
</div>


@endsection('content') 