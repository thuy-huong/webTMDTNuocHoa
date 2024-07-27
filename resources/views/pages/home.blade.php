@extends('layout')
@section('content')

<div class="header__search-mobile grid wide l-0">
    <div class="header__search-mobile-container">
            <form  class="header__search-search-form header__search-search-form-moible" action="{{URL::to('/timkiem')}}" method="POST">
                {{ csrf_field() }}
                <input class="header__search-search-input" type="text" placeholder="Search for product" name="keyWord" id="search">
                <label class="header__search-search-icon" for="search">
                    <button class="header__search-search-icon-link" ></button>
                </label>
                <button type="submit"><i class="header__search-search-icon-mobile fa-solid fa-magnifying-glass"></i></button>
            </form>
      
    </div>
    
</div>
<div class="roll">
    <a href="#" class="back-home">
        <i class="fa-solid fa-arrow-up"></i>
    </a>
    <div class="container grid wide">
        <div class="slide1 row no-gutters">
            <div class="slide1__category col l-3 m-0 c-0">
                <div class="slide1__category-header">
                    <h3>
                    <i class="slide1__category-header-icon fa-solid fa-bars-staggered"></i>
                   Thương hiệu</h3>
                </div>
                <ul class="slide1__category-list">
                    @foreach ($brand as $key => $brand_product)
                    <li class="slide1__category-item">
                        <a href="{{URL::to('/sanpham-thuonghieu/'.$brand_product->maThuongHieu)}}" class="slide1__category-item-link">
                            <span>{{($brand_product->tenThuongHieu)}}</span> 
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="slide1__content col l-9 m-11 c-11">
                <div class="slide1__content-sidebar col l-12 m-0 c-0">
                    <ul class="slide1__content-sidebar-list">
                        <li class="slide1__content-sidebar-item">
                            <a class="slide1__content-sidebar-item-link slide1__content-sidebar-item-link--current" href="#">
                                <i class="slide1__content-sidebar-item-icon fa-solid fa-house"></i>
                                <span>TRANG CHỦ</span>
                            </a>
                        </li>
                        <li class="slide1__content-sidebar-item">
                            <a class="slide1__content-sidebar-item-link" href="{{URL::to('/sanpham')}}">
                                <i class="slide1__content-sidebar-item-icon fa-solid fa-list"></i>
                                <span>DANH MỤC</span>
                            </a>
                           
                                <ul class="slide1__sidebar-blog-list">
                                    @foreach ($cate as $key => $cate_product)
                                    <li class="slide1__sidebar-blog-item">
                                        <a href="{{URL::to('/sanpham-danhmuc/'.$cate_product->maDanhMuc)}}" class="slide1__sidebar-blog-link">
                                            {{($cate_product->tenDanhMuc)}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            
                        </li>
                        <li class="slide1__content-sidebar-item">
                            <a class="slide1__content-sidebar-item-link" href="{{URL::to('/sanpham')}}">
                                <span>THƯƠNG HIỆU</span>
                            </a> 
                            <ul class="slide1__sidebar-blog-list">
                                @foreach ($brand as $key => $brand_product)
                                <li class="slide1__sidebar-blog-item">
                                    <a href="{{URL::to('/sanpham-thuonghieu/'.$brand_product->maThuongHieu)}}" class="slide1__sidebar-blog-link">
                                        {{($brand_product->tenThuongHieu)}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        
                        <li class="slide1__content-sidebar-item">
                            <a class="slide1__content-sidebar-item-link" href="#">
                                <i class="slide1__content-sidebar-item-icon fa-solid fa-mug-hot"></i>
                                <span>VỀ CHÚNG TÔI</span>
                            </a> 
                        </li>
                        <li class="slide1__content-sidebar-item">
                            <a class="slide1__content-sidebar-item-link" href="#">
                                <i class="slide1__content-sidebar-item-icon fa-solid fa-earth-africa"></i>
                                <span>LIÊN HỆ</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="slide1__content-home m-12 c-12">
                    <img src="{{('public/front_end/images/slider_1.webp')}}" class="img-fluid" >
                </div>
            </div>
        </div>
        <div class="slide2">
            <div class="slide2__header row">
                <div class="slide2__header-title col l-2 m-12">
                    <h2>Chanel</h2>
                </div>
            </div>
            <div class="slide2__container">
                <div class="slide2__product row">
                    <div class="slide2__product-lar col l-4 m-8 c-0 ">
                        <a href="#" class="slide2__product-lar-link">
                            <img src="{{('public/front_end/images/Chanel.webp')}}" class="slide2__product-lar-img">
                            <div class="coating"></div>
                        </a>
                    </div>
                    
                    <div class="slide2__product-medium col l-8 m-4 c-12">
                        <div class="slide2__product-medium-list row">
                            <a class="slide2__product-medium-up-link" href="#first-product">
                                <i class="slide2__product-medium-up-icon fa-solid fa-up-long"></i>
                            </a>
                            <a class="slide2__product-medium-down-link" href="#last-product">
                                <i class="slide2__product-medium-down-icon fa-solid fa-down-long"></i>
                            </a>
                            <a name="first-product"></a>
                            @foreach ($product_Chanel as $key => $Chanel)
                            <div id="" class="slide2__product-medium-item col l-3 c-6 m-12">
                                <a class="slide2__product-medium-item-link" href="{{URL::to('/sanpham-chitiet/'.$Chanel->maSanPham)}}">
                                    <div class="cover">
                                        <img src="/public/uploads/product/{{$Chanel->anhSanPham}}" alt="" class="slide2__product-medium-img">
                                        <div class="coating"></div>
                                    </div>
                                </a>
                                    <div class="slide2__product-description">
                                        <h3>{{($Chanel->tenSanPham)}}</h3>
                                        <span class="slide2__product-price slide2__product-price--current">{{number_format($Chanel->gia, 0,',', '.').' '.'VNĐ'}}</span>
                                    </div>
                                    <form action="{{URL::to("/save-cart")}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="product_id_hidden" id="product_id_hidden" value="{{$Chanel->maSanPham}}">
                                        <input type="hidden" name="product_name_hidden" id="product_name_hidden" value="{{$Chanel->tenSanPham }}">
                                        <input type="hidden" name="product_price_hidden" id="product_price_hidden" value="{{$Chanel->gia }}">
                                        <input type="hidden" min="1" name="amount" id="amount" value="1"    >
                                    <div class="slide2__product-action">
                                        <button type="submit" style="border: none;">
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                        </button>
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-solid fa-arrows-rotate"></i>
                                        </div>
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </div>
                                    </div>
                                     </form>
                                
                            </div>
                            @endforeach
                            <a name="last-product"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide3">
            <div class="slide2__header row">
                <div class="slide2__header-title col l-2 m-12">
                    <h2>Dior</h2>
                </div>
            </div>
            <div class="slide2__container">
                <div class="slide2__product row">
                    <div class="slide2__product-lar slide3-order col l-4 m-8 c-0">
                        <a href="#" class="slide2__product-lar-link">
                            <img src="{{('public/front_end/images/Dior.webp')}}" alt="" class="slide2__product-lar-img">
                            <div class="coating"></div>
                        </a>
                    </div>
                    
                    <div class="slide2__product-medium col l-8 m-4 c-12">
                        <div class="slide2__product-medium-list row">
                            <a class="slide2__product-medium-up-link" href="#first-product-2">
                                <i class="slide2__product-medium-up-icon fa-solid fa-up-long"></i>
                            </a>
                            <a class="slide2__product-medium-down-link" href="#last-product-2">
                                <i class="slide2__product-medium-down-icon fa-solid fa-down-long"></i>
                            </a>
                            <a name="first-product-2"></a>
                            @foreach ($product_Dior as $key => $Dior)
                            <div class="slide2__product-medium-item col l-3 c-6 m-12">
                                <a class="slide2__product-medium-item-link" href="{{URL::to('/sanpham-chitiet/'.$Dior->maSanPham)}}">
                                    <div class="cover">
                                        <img  src="/public/uploads/product/{{$Dior->anhSanPham}}" alt="" class="slide2__product-medium-img">
                                        <div class="coating"></div>
                                    </div>
                                    <div class="slide2__product-description">
                                        <h3>{{($Dior->tenSanPham)}}</h3>
                                        <span class="slide2__product-price slide2__product-price--current">{{number_format($Dior->gia, 0,',', '.').' '.'VNĐ'}}</span>
                                    </div>  
                                    <form action="{{URL::to("/save-cart")}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="product_id_hidden" id="product_id_hidden" value="{{$Dior->maSanPham}}">
                                        <input type="hidden" name="product_name_hidden" id="product_name_hidden" value="{{$Dior->tenSanPham }}">
                                        <input type="hidden" name="product_price_hidden" id="product_price_hidden" value="{{$Dior->gia }}">
                                        <input type="hidden" min="1" name="amount" id="amount" value="1"    >
                                    <div class="slide2__product-action">
                                        <button type="submit" style="border: none;">
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </button>
                                    </form>
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-solid fa-arrows-rotate"></i>
                                        </div>
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </div>
                                    </div>
                                    
                                </a>
                            </div>
                            @endforeach
                            <a name="last-product"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide4">
            <div class="slide2__header row">
                <div class="slide2__header-title col l-2 m-12">
                    <h2>Calvin Klein</h2>
                </div>
            </div>
            <div class="slide2__container">
                <div class="slide2__product row">
                    <div class="slide2__product-lar col l-4 m-8 c-0">
                        <a href="#" class="slide2__product-lar-link">
                            <img  src="{{('public/front_end/images/calvinklein.webp')}}" alt="" class="slide2__product-lar-img">
                            <div class="coating"></div>
                        </a>
                    </div>

                    <div class="slide2__product-medium col l-8 m-4 c-12">
                        <div class="slide2__product-medium-list row">
                            <a class="slide2__product-medium-up-link" href="#first-product-3">
                                <i class="slide2__product-medium-up-icon fa-solid fa-up-long"></i>
                            </a>
                            <a class="slide2__product-medium-down-link" href="#last-product-3">
                                <i class="slide2__product-medium-down-icon fa-solid fa-down-long"></i>
                            </a>
                            <a name="first-product-3"></a>
                            @foreach ($product_ck as $key => $ck)
                            <div class="slide2__product-medium-item col l-3 c-6 m-12">
                                <a class="slide2__product-medium-item-link" href="{{URL::to('/sanpham-chitiet/'.$ck->maSanPham)}}">
                                    <div class="cover">
                                        <img  src="/public/uploads/product/{{$ck->anhSanPham}}" alt="" class="slide2__product-medium-img">
                                        <div class="coating"></div>
                                    </div>
                               
                                    <div class="slide2__product-description">
                                        <h3>{{($ck->tenSanPham)}}</h3>
                                        <span class="slide2__product-price slide2__product-price--current">{{number_format($ck->gia, 0,',', '.').' '.'VNĐ'}}</span>
                                    </div>
                                </a>
                                <form action="{{URL::to("/save-cart")}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id_hidden" id="product_id_hidden" value="{{$ck->maSanPham}}">
                                    <input type="hidden" name="product_name_hidden" id="product_name_hidden" value="{{$ck->tenSanPham }}">
                                    <input type="hidden" name="product_price_hidden" id="product_price_hidden" value="{{$ck->gia }}">
                                    <input type="hidden" name="amount" id="amount" value="1">
                                    <div class="slide2__product-action">
                                        <button type="submit" style="border: none;">
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </button>
                                        <div class="slide2__product-action-btn">
                                          <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-solid fa-arrows-rotate"></i>
                                        </div>
                                        <div class="slide2__product-action-btn">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </div>
                                    </div>
                                </form>
                               
                            </div>
                            @endforeach
                            <a name="last-product-3"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- --}}
        <div class="slide__hotdeal">
            <div class="slide__hotdeal__header">
                <div class="slide__hotdeal__header-title">
                    <h2>SẢN PHẨM MỚI</h2>
                </div>
                <div class="slide2__header-selection m-0">
                        
                </div>
            </div>
            <div class="slide__hotdeal-list row">

                @foreach($new_product as $key => $new)
                <div class="slide__hotdeal-item col l-3 m-6 c-12">
                    <div class="slide__hotdeal-product">
                        <a class="slide__hotdeal-img-link" href="{{URL::to('/sanpham-chitiet/'.$new->maSanPham)}}">
                            <img src="/public/uploads/product/{{$new->anhSanPham}}" alt="" class="slide__hotdeal-img">
                        
                        </a>
                        <div class="slide__hotdeal-description">
                            <h3>{{($new->tenSanPham)}}</h3>
                            <span class="slide1__item-living-room-price slide1__item-living-room-price--current">{{number_format($new->gia, 0,',', '.').' '.'VNĐ'}}</span>
                        </div>
                        <form action="{{URL::to("/save-cart")}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id_hidden" id="product_id_hidden" value="{{$new->maSanPham}}">
                            <input type="hidden" name="product_name_hidden" id="product_name_hidden" value="{{$new->tenSanPham }}">
                            <input type="hidden" name="product_price_hidden" id="product_price_hidden" value="{{$new->gia }}">
                            <input type="hidden" name="amount" id="amount" value="1">
                            <div class="slide-hotdeal__product-action">
                                <div class="slide-hotdeal__product-action-btn">
                                    <button type="submit" style="border: none;"><i class="fa-solid fa-cart-shopping"></i></button>
                                </div>
                                <div class="slide-hotdeal__product-action-btn">
                                  <i class="fa-regular fa-heart"></i>
                                </div>
                                <div class="slide-hotdeal__product-action-btn">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </div>
                                <div class="slide-hotdeal__product-action-btn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                  
                </div>
                @endforeach
                   
                </div>
            </div>
        </div>
        
    </div>

@endsection('content')