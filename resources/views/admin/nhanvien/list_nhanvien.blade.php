@extends('admin_layout')
@section('content')
<div>
    <h2>Danh sách nhân viên</h2>
    <div class="search-container" >
        <form action="{{URL::to('/danhsach-nhanvien')}}" method="get">
                <input type="search" name="keyword" id="keyword" placeholder="Nhập tên cần tìm ....">
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
                <th>Mã NV</th>
                <th>Tên nhân viên </th>
                <th>Địa chỈ</th>
                <th>Số điện thoại</th>       
                <th>Email</th>       
                <th>Mật khẩu</th>       
                <th>Trạng thái</th>       
                <th>Chức năng</th>    
            </tr>
        </thead>
        <tbody>
            @foreach($list_nhanvien as $key => $nhanvien)
            <tr>
                <td>{{ $nhanvien->maNhanVien }}</td>
                <td>{{ $nhanvien->tenNhanVien }}</td>
                <td>{{ $nhanvien->diachi }}</td>
                <td>{{ $nhanvien->sodienthoai }}</td>
                <td>{{ $nhanvien->email }}</td>
                <td>{{ $nhanvien->matkhau }}</td>
                <td>
                    <?php
                        if($nhanvien->trangthai==0){
                    ?>
                            <a href="{{URL::to('/hienthi-nhanvien/'.$nhanvien->maNhanVien)}}"><i class="fa-solid fa-person-circle-xmark" style="color: red;"></i></i></a>
                    <?php
                        }else{
                    ?>
                            <a href="{{URL::to('/an-nhanvien/'.$nhanvien->maNhanVien)}}"><i class="fa-solid fa-person-circle-check" style="color: blue;"></i></i></a>
                    <?php
                        }
                            
                    ?>

                </td>
                <td>
                    <a href="{{URL::to('/sua-nhanvien/'.$nhanvien->maNhanVien)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return confirm(' Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/xoa-nhanvien/'.$nhanvien->maNhanVien)}}">
                        <i class="fa-solid fa-delete-left"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection('content')