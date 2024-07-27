@extends('admin_layout')
@section('content')

    <div class="form-container" >
        <form id="newCategoryForm" action="{{URL::to('/update-category/'. $edit_category->maDanhMuc)}}" method="post">
            <h2>Chỉnh sửa danh mục sản phẩm</h2>
            
            {{ csrf_field() }}
            <tr>
            <div class="form-group">
                <label for="categoryName">Tên Danh Mục:</label>
                <input type="text" id="tendanhmuc" name="tendanhmuc" required value="{{ $edit_category->tenDanhMuc}}">
            </div>
            <div class="form-group">
                <label for="categoryName">Mô tả:</label>
                <textarea style="resize: none" rows="8" id="mota" name="mota" >{{ $edit_category->mota}}</textarea>
            </div>
            <div class="form-group">
                <label for="categoryName">Trạng thái:</label>
                <select name="trangthai" id="trangthai">
                    <option value="1" <?php if ( $edit_category->trangthai==1){echo "selected";}?> >Hiện</option>
                    <option value="0" <?php if ( $edit_category->trangthai==0){echo "selected";}?> >Ẩn</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Cập nhật</button>
            </div>
        </form>
    </div>



@endsection('content')