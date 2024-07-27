@extends('admin_layout')
@section('content')

        <div class="main-top">
            <h1>Bảng điều khiển</h1>
            
        </div>
        <div class="main-skills">
            <div class="card">
                <i class="fa-solid fa-user-large"></i>
                <h3 style="color: red">Tổng số khách hàng</h3>
                <p><b>
                    <?php   
                        echo session()->get('count_customer').' khách hàng';
                    ?>    
                </b></p>
                <button><a href="{{URL::to('/danhsach-khachhang')}}">Chi tiết</a></button>
            </div>
            <div class="card">
                <i class="fa-solid fa-coins"></i>
                <h3 style="color: red">Tổng sản phẩm</h3>
                <p><b> 
                    <?php   
                        echo session()->get('count_product').' sản phẩm';
                    ?>  
                </b></p>
                <button><a href="{{URL::to('/danhsach-sanpham')}}">Chi tiết</a></button>
            </div>
            <div class="card">
                <i class="fa-solid fa-basket-shopping"></i>
                <h3 style="color: red">Tổng số đơn hàng</h3>
                <p><b>
                    <?php   
                        echo session()->get('count_order').' đơn hàng';
                    ?> 
                </b></p>
                <button><a href="{{URL::to('/danhsach-donhang')}}">Chi tiết</a></button>
            </div>
            <div class="card">
                <i class="fa-solid fa-circle-exclamation"></i>
                <h3 style="color: red">Sắp hết hàng</h3>
                <p><b> <?php   
                    echo session()->get('count_pro_out_of_stock').' Sản phẩm';
                ?> </b></p>
                <button>Chi tiết</button>
            </div>
        </div>
{{-- 
        <section class="main-order">
            <h1>Sản phẩm bán chạy</h1>
            <div id="chart" style="height: 250px;"></div>
        </section> --}}
      
@endsection('content')