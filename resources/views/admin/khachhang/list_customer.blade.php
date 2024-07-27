@extends('admin_layout')
@section('content')
<div class="form-container" >
        <h2>Danh sách khách hàng</h2>
        <div class="search-container" >
            <form action="{{URL::to('/danhsach-khachhang')}}" method="get">
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
                <th>Mã KH</th>
                <th>Tên khách hàng</th>
                <th>Địa chỈ</th>
                <th>Số điện thoại</th>       
                <th>Email</th>       
                <th>Mật khẩu</th>       
                <th>Trạng thái</th>       
                {{-- <th>Chức năng</th>  --}}
            </tr>
        </thead>
        <tbody>
            @foreach( $list_customer as $key => $customer)
            <tr >
                <td>{{ $customer->maKhachHang }}</td>
                <td>{{ $customer->tenKhachHang }}</td>
                <td>{{ $customer->diachi }}</td>
                <td>{{ $customer->sodienthoai }}</td>
                <td>{{ $customer->email}}</td>
                <td>{{ $customer->matkhau }}</td>
                <td style="text-align: center">
                    <?php
                        if($customer->trangthai==0){
                    ?>
                            <a href="{{URL::to('/hienthi-khachhang/'.$customer->maKhachHang)}}"><i class="fa-solid fa-lock" style="color: red;"></i></a>
                    <?php
                        }else{
                    ?>
                            <a href="{{URL::to('/an-khachhang/'.$customer->maKhachHang)}}"><i class="fa-solid fa-lock-open" style="color: blue;"></i></a>
                    <?php
                        }
                            
                    ?>

                </td>
                {{-- 
                <td style="text-align: center; ">
                    <a onclick="return confirm(' Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/delete-khachhang/'.$customer->maKhachHang)}}">
                        <i class="fa-solid fa-trash" style="color: red;"></i>
                    </a>
                </td>
                 --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection('content')