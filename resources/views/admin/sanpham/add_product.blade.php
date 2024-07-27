@extends('admin_layout')
@section('content')

    <div class="form-container" >
        <form id="newProductForm" action="{{URL::to('/luu-sanpham')}}" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center;">Thêm mới sản phẩm</h2>
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
                <input type="file" id="product_image" name="product_image" required>
            </div>
            <div class="form-group">
                <label for="productName">Tên sản phẩm:</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="productName">Mô tả sản phẩm:</label>
                <textarea style="resize: none" rows="8" name="product_desc" ></textarea>
            </div>
            <div class="form-group">
                <label for="productName">Giá sản phẩm:</label>
                <input type="text" id="product_price" name="product_price" required>
            </div>
          
            <div class="form-group">
                <label for="productName">Thương hiệu:</label>
                <select name="product_brand" id="product_brand">
                    @foreach ($brand as $key => $brand_product)
                        <option value="{{($brand_product->maThuongHieu)}}">{{($brand_product->tenThuongHieu)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="productName">Số lượng:</label>
                <input type="number" id="product_qty" name="product_qty" required>
            </div>
          
            <div class="form-group">
                <label for="productName">Danh mục sản phẩm:</label>
                <select name="product_cate" id="product_cate">
                    @foreach ($cate as $key => $cate_product)
                        <option value="{{($cate_product->maDanhMuc)}}">{{($cate_product->tenDanhMuc)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="productName">Trạng thái:</label>
                <select name="product_status" id="product_status">
                    <option value="1" selected>Hiện</option>
                    <option value="0" >Ẩn</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Thêm mới sản phẩm</button>
            </div>
        </form>
    </div>



@endsection('content')