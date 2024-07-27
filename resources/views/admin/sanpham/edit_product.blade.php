@extends('admin_layout')
@section('content')

    <div class="form-container" >
        <form id="newProductForm" action="{{URL::to('/update-sanpham/'. $edit_product->maSanPham)}}" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center;">Cập nhật thông tin sản phẩm</h2>
            <?php
                $message = session()->get('message');
                if($message){
                    echo '<span class="text-alert" color="red">'.$message.'</span>' ;
                    session()->put('message', null);
                }
            ?> 
            {{ csrf_field() }}
            <div class="form-group">
                <label for="productName">Hình ảnh sản phẩm:</label>
                <input type="file" id="product_image" name="product_image" >
                <img src="{{URL::to('/public/uploads/product/'. $edit_product->anhSanPham)}}" alt="" height="150px" width="200px">
            </div>
            <div class="form-group">
                <label for="productName">Tên sản phẩm:</label>
                <input type="text" id="product_name" name="product_name"  value="{{ $edit_product->tenSanPham}}">
            </div>
            <div class="form-group">
                <label for="productName">Mô tả sản phẩm:</label>
                <textarea style="resize: none" rows="8" name="product_desc" >{{ $edit_product->mota}}</textarea>
            </div>
            <div class="form-group">
                <label for="productName">Giá sản phẩm:</label>
                <input type="text" id="product_price" name="product_price" value="{{$edit_product->gia}}" >
            </div>
          
            <div class="form-group">
                <label for="productName">Thương hiệu:</label>
                <select name="product_brand" id="product_brand">
                    @foreach ($product_brand as $key => $brand_product)
                        @if($brand_product->maThuongHieu== $edit_product->thuonghieu)
                            <option value="{{($brand_product->maThuongHieu)}}" selected>{{($brand_product->tenThuongHieu)}}</option>
                        @else
                            <option value="{{($brand_product->maThuongHieu)}}">{{($brand_product->tenThuongHieu)}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="productName">Số lượng:</label>
                <input type="number" id="product_qty" name="product_qty"  value="{{ $edit_product->soluong}}">
            </div>
          
            <div class="form-group">
                <label for="productName">Danh mục sản phẩm:</label>
                <select name="product_cate" id="product_cate">
                    @foreach ($product_cate as $key => $cate_product)
                        @if($cate_product->maDanhMuc== $edit_product->danhmuc)
                        <option value="{{($cate_product->maDanhMuc)}}" selected>{{($cate_product->tenDanhMuc)}}</option>
                        @else
                        <option value="{{($cate_product->maDanhMuc)}}">{{($cate_product->tenDanhMuc)}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="productName">Trạng thái:</label>
                <select name="product_status" id="product_status">
                    <option value="1" <?php if ( $edit_product->trangthai==1){echo "selected";}?> >Hiện</option>
                    <option value="0" <?php if ( $edit_product->trangthai==0){echo "selected";}?> >Ẩn</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Cập nhật</button>
            </div>
        </form>
    </div>



@endsection('content')