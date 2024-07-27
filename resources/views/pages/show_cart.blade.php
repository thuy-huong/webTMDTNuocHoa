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
    <h1 class="text-center">Giỏ hàng</h1>
        <?php
            $content = Cart::content();
        ?> 
        <table style="border:1px;" width="100%" cellspacing="0" cellpadding="0" >
            <thead>
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
                <tbody id="datarow">
                    @foreach( $content as $v_content)
                    <tr>
                        <td>
                                <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="50px" ></a>
                        </td>
                        <td>{{$v_content->name}}</td>
                        <td class="text-right">{{number_format($v_content->price , 0,',', '.').' '.'VNĐ'}}</td>
                        <td class="text-right">
                            <form action="{{URL::to('/update-cart-qty')}}" method="post">
                                {{ csrf_field() }}
                                
                                <input type="number" name="cart_quantity" min="1" value="{{$v_content->qty}}" class="btn btn-defaul btn-sm">
                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" value="form-control">
                                <button type="submit" name="update_qty"  id="update_qty" class="btn btn-defaul btn-sm">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </form>
                        </td>
                        
                        <td class="text-right">
                            <?php 
                                $subtotal = $v_content->price *$v_content->qty;
                                echo number_format( $subtotal , 0,',', '.').' '.'VNĐ';
                            ?>
                        </td>
                        <td>
                            <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                            <a onclick="return confirm(' Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}" id="delete_1" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham">
                                <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng tiền <span>{{cart::priceTotal(0, ',', '.').' '.'VNĐ'}}</span></li>
                        <li>Thuế <span>{{cart::tax(0 ,',', '.').' '.'VNĐ'}}</span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span>{{cart::total(0 ,',', '.').' '.'VNĐ'}}</span></li>
                    </ul>
                            {{-- <a class="btn btn-default update" href="">Update</a>
                            <a class="btn btn-default check_out" href="">Check Out</a> --}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="pay">
                    <a href="{{URL::to('/sanpham')}}" class=" btn btn-shopping"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i>&nbsp;Tiếp tục mua sắm</a>
                    <?php
                            $customer_id = session()->get('maKhachHang');
                            if($customer_id!=null){
                        ?>
                            <a href="{{URL::to('/thanhtoan')}}" class="btn btn-pay">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán
                            </a>
                        <?php
                            }else {
                        ?>
                            <a href="{{URL::to('/dangnhap-khachhang')}}" class="btn btn-pay">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Thanh toán
                            </a>
                        <?php
                                }
                        ?>       
                    </div>
                </div>   
            </div>
        </div>
</div>


@endsection('content') 