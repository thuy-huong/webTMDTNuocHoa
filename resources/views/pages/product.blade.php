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
    <section class="wrapper">
        <div class="products">
            <ul>
                @foreach ($list_product as $key => $product)
               
                    <li class="main-product"><a href="{{URL::to('/sanpham-chitiet/'.$product->maSanPham)}}">
                        <div class="img-product">
                            <img class="img-prd" src="/public/uploads/product/{{$product->anhSanPham}}" alt="">
                        </div>
                    </a>
                        <form action="{{URL::to("/save-cart")}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id_hidden" id="product_id_hidden" value="{{$product->maSanPham}}">
                            <input type="hidden" name="product_name_hidden" id="product_name_hidden" value="{{$product->tenSanPham }}">
                            <input type="hidden" name="product_price_hidden" id="product_price_hidden" value="{{$product->gia }}">
                            <input type="hidden" name="amount" id="amount" value="1">
                            <div class="content-product">
                                <h3 class="content-product-h3">{{($product->tenSanPham)}}</h3>
                                <div class="content-product-deltals">
                                    <div class="price" style="color: red;">
                                        <span class="money">{{number_format($product->gia, 0,',', '.').' '.'VNĐ'}}</span>
                                    </div>
                                
                                    <button type="submit" class="btn btn-cart" style="border: solid white;
                                    background: #11f1bf;">Thêm Vào Giỏ</button>
                                
                                </div>
                            </div>
                        </form>
                    </li>
               
                @endforEach
            </ul>
        </div>
    </section>
</div>

@endsection('content')