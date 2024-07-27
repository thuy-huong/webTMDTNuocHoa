@extends('admin_layout')
@section('content')
<div  >

    <h2>Danh sách thương hiệu</h2>
    <div class="search-container" >
        <form action="{{URL::to('/danhsach-thuonghieu')}}" method="post">
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
                <th>Mã</th>
                <th>Tên thương hiệu</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>       
                <th>Chức năng</th>    
            </tr>
        </thead>
        <tbody>
            @foreach($list_brand as $key => $brand)
            <tr>
                <td>{{ $brand->maThuongHieu }}</td>
                <td>{{ $brand->tenThuongHieu }}</td>
                <td>{{ $brand->mota }}</td>
                <td>
                    <?php
                    if($brand->trangthai==0){
                ?>
                        <a href="{{URL::to('/hienthi-thuonghieu/'.$brand->maThuongHieu)}}"><i class="fa-solid fa-eye-slash"style="color: red;"></i></a>
                <?php
                    }else{
                ?>
                        <a href="{{URL::to('/an-thuonghieu/'.$brand->maThuongHieu)}}"><i class="fa-solid fa-eye"  style="color: blue;"></i></a>
                <?php
                    }
                        
                ?>

                </td>
                <td>
                    <a href="{{URL::to('/sua-thuonghieu/'.$brand->maThuongHieu)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a onclick="return confirm(' Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/xoa-thuonghieu/'.$brand->maThuongHieu)}}">
                        <i class="fa-solid fa-delete-left"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="dieukhien">
        {{$list_brand->appends(request()->all())->links()}}
    </div>
            
</div>

@endsection('content')