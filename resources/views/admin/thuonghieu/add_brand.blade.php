@extends('admin_layout')
@section('content')

    <div class="form-container" >
        <form id="newbrandForm" action="{{URL::to('/save-brand')}}" method="post">
            <h2>Thêm mới thương hiệu</h2>
            <?php
            
            $message = session()->get('message');
            if($message){
                echo '<span class="text-alert" color="red">'.$message.'</span>' ;
                session()->put('message', null);
            }
        ?> 
            {{ csrf_field() }}
            {{-- <div class="form-group">
                <label for="categoryName">Mã Danh Mục:</label>
                <input type="text" id="category_id" name="category_id">
            </div> --}}
            <div class="form-group">
                <label for="categoryName">Tên thương hiệu:</label>
                <input type="text" id="tenthuonghieu" name="tenthuonghieu" required>
            </div>
            <div class="form-group">
                <label for="categoryName">Mô tả:</label>
                <textarea style="resize: none" rows="8" id="mota" name="mota" ></textarea>
            </div>
            <div class="form-group">
                <label for="categoryName">Trạng thái:</label>
                <select name="trangthai" id="trangthai">
                    <option value="1" selected>Hiện</option>
                    <option value="0" >Ẩn</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Thêm Mới</button>
            </div>
        </form>
    </div>



@endsection('content')