@extends('admin_layout')
@section('content')
<div  >
        <h2 style="text-align: center;">Danh sách sản phẩm</h2>
    <div class="search-container" >
        <form action="{{URL::to('/timkiem-sanpham')}}" method="get">
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
                <th>Mã SP</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thương hiệu</th>
                <th>Danh mục</th>       
                <th>Tt</th>       
                <th>Chức năng</th>    
            </tr>
        </thead>
        <tbody>
             @foreach( $list_product as $key => $product)
            <tr>
                <td>{{ $product->maSanPham }}</td>
                <td>{{ $product->tenSanPham }}</td>
                <td><img src="public/uploads/product/{{ $product->anhSanPham}}" height="100px" width="150px"></td>
                <td>{{ $product->gia }}</td>
                <td>{{ $product->soluong }}</td>
                <td>{{ $product->tenThuongHieu }}</td>
                <td>{{ $product->tenDanhMuc }}</td>
                <td>
                    <?php
                    if($product->trangthai==0){
                ?>
                        <a href="{{URL::to('/hienthi-sanpham/'.$product->maSanPham)}}"><i class="fa-solid fa-eye-slash"style="color: red;"></i></a>
                <?php
                    }else{
                ?>
                        <a href="{{URL::to('/an-sanpham/'.$product->maSanPham)}}"><i class="fa-solid fa-eye"  style="color: blue;"></i></a>
                <?php
                    }
                        
                ?>
                <td>
                    <a href="{{URL::to('/sua-sanpham/'.$product->maSanPham)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return confirm(' Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/xoa-sanpham/'.$product->maSanPham)}}">
                        <i class="fa-solid fa-delete-left"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="dieukhien">
        {{$list_product->appends(request()->all())->links()}}
    </div>
</div>

@endsection('content')