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
                <li><a href="{{URl::to('/sanpham')}}">DANH MỤC</a>
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
                <li><a href="{{URL::to('/sanpham')}}">
                    SẢN PHẨM
                </a>
                </li>
                <li><a href="#">
                    <i class="slide1__content-sidebar-item-icon fa-solid fa-mug-hot"></i>
                    VỀ CHÚNG TÔI
                </a></li>
                <li><a href="#">LIÊN HỆ</a></li>
            </ul>
        </nav>   
    </section>
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="m-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="/public/uploads/product/{{$details_product->anhSanPham}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="m-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$details_product->tenSanPham}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">{{number_format($details_product->gia , 0,',', '.').' '.'VNĐ'}}</div>
                        <p>{{$details_product->mota}}</p>
                        <form action="{{URL::to("/save-cart")}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id_hidden" id="product_id_hidden" value="{{$details_product->maSanPham}}">
                            <input type="hidden" name="product_name_hidden" id="product_name_hidden" value="{{$details_product->tenSanPham }}">
                            <input type="hidden" name="product_price_hidden" id="product_price_hidden" value="{{$details_product->gia }}">
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div id="buy-amount">
                                    <button class="minus-bnt" onclick="handleMinus()"><i class="fa-solid fa-minus"></i></button>
                                    <input type="number" min="1" name="amount" id="amount" value="1"  >
                                    <button class="plus-btn" onclick="handlePlus()"><i class="fa-solid fa-plus"></i></button>
                                </div>  
                            </div>
                        </div>
                        <button style="submit" class="primary-btn" style="border: none;">ADD TO CARD</button>
                        </form>
                        <ul>
                            <li><b>Thương hiệu</b> <span>{{$details_product->tenThuongHieu}}</span></li>
                            <li><b>Danh mục</b> <samp>{{$details_product->tenDanhMuc}}</span></li>
                            <li><b>Số lượng</b> <span>{{$details_product->soluong}}</span></li>
                            <li><b>Chia sẻ</b>
                                <div class="share">
                                    <a href="#"><i class="fa-brands fa-facebook"></i></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <!-- Tab items -->
                        <div class="tabs">
                            <div class="tab-item active">CHI TIẾT SẢN PHẨM</div>
                            <div class="tab-item">THƯƠNG HIỆU SẢN PHẨM</div>
                            <div class="tab-item">BÌNH LUẬN</div>
                          
                            <div class="line"></div>
                        </div>
                    <div class="tab-content">
                            <div class="tab-pane active">
                                <h3>Thông tin chi tiết sản phẩm</h3>
                                <p>{{$details_product->mota }}</p>
                            </div>
                            <div class="tab-pane">  
                                <h3>{{$details_product->tenThuongHieu}}</h3>
                                <p>{{$details_product->mota }}</p>
                            </div>
                            <div class="tab-pane">
                                
                                <b>Nội dung đang được cập nhật...</b>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper">
        <div class="products">
            <ul>
                @foreach ($related_products as $key => $product)
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
                                <button type="submiy" class="btn btn-cart" style="border: solid white;
                                background: #11f1bf;">Thêm Vào Giỏ</button>
                            </div>
                        </div>
                    </form>
                
                </li>
                @endforEach
            </ul>
            <div class="all-pro">
                <a href="{{URL::to('/sanpham')}}" previewlistener="true">Xem tất cả</a>
            </div>
            
        </div>
    </section>
</div>
<script>
      $(".product__details__pic__slider").owlCarousel({
        loop: true,
        margin: 20,
        items: 4,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });
    let amountElement = document.getElementById('amount')
    let amount = amountElement.value
    let render = (amount) => {
      amountElement.value = amount
    }
    let handlePlus = () =>{
      amount++
      render(amount);
    }
    let handleMinus = () =>{
      if(amount>1)
      amount--
      render(amount);
    }
  </script>
<script>
    const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const tabs = $$(".tab-item");
const panes = $$(".tab-pane");

const tabActive = $(".tab-item.active");
const line = $(".tabs .line");

requestIdleCallback(function () {
line.style.left = tabActive.offsetLeft + "px";
line.style.width = tabActive.offsetWidth + "px";
});

tabs.forEach((tab, index) => {
const pane = panes[index];

tab.onclick = function () {
$(".tab-item.active").classList.remove("active");
$(".tab-pane.active").classList.remove("active");

line.style.left = this.offsetLeft + "px";
line.style.width = this.offsetWidth + "px";

this.classList.add("active");
pane.classList.add("active");
};
});

</script>
@endsection('content')