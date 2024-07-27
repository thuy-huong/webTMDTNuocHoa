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

    <table style="border:1px;" width="100%" cellspacing="0" cellpadding="0" >
        
        <?php
            
        $message = session()->get('message');
        if($message){
            echo '<span class="text-alert" color="red">'.$message.'</span>' ;
            session()->put('message', null);
        }
    ?> 

        <thead>
            <tr>
                <th>Mã DM</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>       
                <th>Chức năng</th>    
            </tr>
        </thead>
        <tbody>
            @foreach($list_category as $key => $cate_pro)
            <tr>
                <td>{{ $cate_pro->maDanhMuc }}</td>
                <td>{{ $cate_pro->tenDanhMuc }}</td>
                <td>{{ $cate_pro->mota }}</td>
                <td>
                    <?php
                        if($cate_pro->trangthai==0){
                    ?>
                            <a href="{{URL::to('/hienthi-danhmuc/'.$cate_pro->maDanhMuc)}}"><i class="fa-solid fa-eye-slash"style="color: red;"></i></a>
                    <?php
                        }else{
                    ?>
                            <a href="{{URL::to('/an-danhmuc/'.$cate_pro->maDanhMuc)}}"><i class="fa-solid fa-eye"  style="color: blue;"></i></a>
                    <?php
                        }
                            
                    ?>

                </td>
                <td>
                    <a href="{{URL::to('/sua-danhmuc/'.$cate_pro->maDanhMuc)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return confirm(' Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/xoa-danhmuc/'.$cate_pro->maDanhMuc)}}">
                        <i class="fa-solid fa-delete-left"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="dieukhien">
        {{$list_category->appends(request()->all())->links()}}
    </div>
            
</div>


@endsection('content')