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
    <?php
    $content = Cart::content();
    ?> 
    <section style="max-width: 90%;
    margin-left: 5%;">
        <div class="py-5 text-center">
            <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
            <h1>Thanh toán</h1>
            <p class="lead" style="font-size: 2rem;">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
        </div>
        <div class="row">
            <div class="m-7" >
                <form action="{{URL::to('/order-place')}}" method="post">
                    {{ csrf_field() }}  
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted" style="font-size: 1.6rem;">Giỏ hàng</span>
                        <p class="badge badge-secondary badge-pill" style="color: black; font-size: 1.4rem;"> <?php
                            $count=Cart::count();
                            echo  $count.' sản phẩm';
                        ?></p>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach( $content as $v_content)
                       <li class="list-group-item d-flex justify-content-between " style="border: 0.5px gray solid;">
                           <div>
                               <p class="my-0" style="font-size: 1.7rem;">{{$v_content->name}}</p>
                               <small class="text-muted" >{{number_format($v_content->price , 0,',', '.')}} x {{$v_content->qty}}</small>
                           </div>
                           <span class="text-muted"> <?php 
                               $subtotal = $v_content->price *$v_content->qty;
                               echo number_format( $subtotal , 0,',', '.');
                           ?></span>
                       </li>
                       @endforeach
                       <li class="list-group-item d-flex justify-content-between" style="border: 0.5px gray solid;">
                           <span>Thuế </span>
                           <span>{{cart::tax(0 ,',', '.')}}</span>
                       </li>
                       <li class="list-group-item d-flex justify-content-between" style="border: 0.5px gray solid;">
                           <span>Phí vận chuyển</span>
                           <span>0</span>
                       </li>
                       <li class="list-group-item d-flex justify-content-between" style="border: 0.5px gray solid;">
                           <span>Tổng thành tiền</span>
                           <strong>{{cart::total(0 ,',', '.')}}</strong>
                       </li>
                       <h4 class="mb-3">Hình thức thanh toán</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            
                            <label class="custom-control-label" for="httt-1" >
                                <input id="payment_option" name="payment_option" checked type="checkbox" class="custom-control-input" 
                                value="1">Tiền mặt
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            
                            <label class="custom-control-label" for="httt-2">
                                <input id="payment_option" name="payment_option" type="checkbox" class="custom-control-input" 
                                value="2">Chuyển khoản
                            </label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    
                    <button class="btn-oder" type="submit"  name="btnDatHang">Đặt
                        hàng</button>
                   </ul>
                </form>

            </div>
                <div class="m-1"></div>
            <div class="m-4 order-md-2">
                <div class="row">
                    <form action="{{URL::to('/update-cus/'.$shipping_customer->maKhachHang)}}" method="post">
                        {{ csrf_field() }} 
                        <div class="row ">
                            <div class="m-10 order-md-1">
                                <h4 class="mb-3">Thông tin gửi hàng</h4>
                               
                                <div class="row">
                                    <div class="c-12">
                                        <label for="kh_ten" style="font-size: 1.6rem;">Họ tên: </label>
                                        <input type="text" class="form-control" name="shipping_name" value="{{$shipping_customer->tenKhachHang}}">
                                    </div>
                                    <div class="c-12">
                                        <label for="kh_diachi"  style="font-size: 1.6rem;">Địa chỉ: </label>
                                        <input type="text" class="form-control" name="shipping_address" value="{{$shipping_customer->diachi}}">
                                    </div>
                                    <div class="c-12">
                                        <label for="kh_dienthoai"  style="font-size: 1.6rem;">Điện thoại: </label>
                                        <input type="text" class="form-control" name="shipping_phone" value="{{$shipping_customer->sodienthoai}}" >
                                    </div>
                                    <div class="c-12">
                                        <label for="kh_email"  style="font-size: 1.6rem;">Email: </label>
                                        <input type="text" class="form-control" name="shipping_email" readonly value="{{$shipping_customer->email}}" >
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <label for="kh_email">Ghi chú</label>
                                        <textarea type="text" class="form-control" name="shipping_note" >{{$shipping->shipping_note}}</textarea>
                                    </div> --}}
                                </div>
                                <hr class="mb-4">

                                <button class="btn-update-cus" type="submit" name="btnDatHang">Cập nhật</button>
                                  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection('content') 