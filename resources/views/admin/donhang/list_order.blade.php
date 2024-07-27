@extends('admin_layout')
@section('content')
<div style="width: 90%; margin-left: 5%;">
    <h2>Danh sách danh mục sản phẩm</h2>
    <div class="search-container" >
        <form action="{{URL::to('/danhsach-danhMuc')}}" method="get">
                <input type="search" name="keyword" id="keyword" value="" placeholder="Nhập tên cần tìm ....">
                <button type="submit" name="btnSearch" id="btnSearch"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <table border="1px" width="100%" cellspacing="0" cellpadding="0" >
        <?php
                
            $message = session()->get('message');
            if($message){
                echo '<span class="text-alert" color="red">'.$message.'</span>' ;
                session()->put('message', null);
            }
        ?> 

        <thead>
            <tr>
                <th>Tên người đặt</th>
                <th>Tổng số tiền</th>
                <th>Phương thức TT</th>
                <th>Tình trạng</th>
                <th>Xử lý</th>
                <th></th>
            </tr>
        </thead>
        <tbody >
            @foreach( $list_order as $key => $order)
            <tr >
                <td>{{ $order->tenKhachHang }}</td>
                <td>{{ $order->tongsotien }} VNĐ</td>
                <td> <?php
                        if( $order->phuongThucTT == 1){
                            echo 'Tiền mặt';
                        }else{echo 'Chuyển khoản';}
                    ?>
                </td>
              
                <td> <?php
                        if( $order->order_status =='1'){
                            echo 'Đang chờ xử lý';
                        }elseif ($order->order_status=='2'){
                            echo 'CHờ giao hàng';
                        }else{echo 'Hoàn thành';}
                    ?>
                </td>
                <td>
                    <?php
                        if( $order->order_status =='1'){

                        ?>
                        <a href="{{URL::to('/accept-order/'.$order->maDonHang)}}" class="btn" style="color: #fff;background-color: #5bc0de; border-color: #46b8da;">Chấp nhận</a>
                        <?php
                        }elseif ($order->order_status=='2'){
                    ?>
                        <a href="{{URL::to('/delivery-order/'.$order->maDonHang)}}" class="btn" style="color: #fff;
                            background-color: #5cb85c;
                            border-color: #4cae4c;">Giao hàng</a>
                    <?php
                        }else{echo 'Hoàn thành';}
                    ?>
                </td>
                <td style="text-align: center; ">
                    <a href="{{URL::to('/chitiet-donhang/'.$order->maDonHang)}}">
                       <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endsection('content')