@extends('admin_layout')
@section('content')

    <div class="form-container" >
        <form id="newStaffForm" action="{{URL::to('/capnhat-nhanvien/'. $edit_nv->maNhanVien)}}" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center;">Chỉnh sửa thông tin nhân viên</h2>
            <?php
                $message = session()->get('message');
                if($message){
                    echo '<span class="text-alert" color="red">'.$message.'</span>' ;
                    session()->put('message', null);
                }
            ?> 
            {{ csrf_field() }}

            <div class="form-group">
                <label for="staffName">Tên nhân viên:</label>
                <input type="text" id="staff_name" name="staff_name" value="{{$edit_nv->tenNhanVien}}" >
            </div>
            <div class="form-group">
                <label for="staffName">Địa chỉ:</label>
                <textarea style="resize: none" rows="3" name="staff_address" >{{$edit_nv->diachi}}</textarea>
            </div>
            <div class="form-group">
                <label for="staffName">Số điện thoại:</label>
                <input type="text" id="staff_phoneNumber" name="staff_phoneNumber" value="{{$edit_nv->sodienthoai}}" >
            </div>
            <div class="form-group">
                <label for="staffName">Email:</label>
                <input type="text" id="staff_email" name="staff_email" value="{{$edit_nv->email}}">
            </div>
            <div class="form-group">
                <label for="staffName">Mật khẩu:</label>
                <input type="text" id="staff_pass" name="staff_pass" value="{{$edit_nv->matkhau}}">
            </div>

            <div class="form-group">
                <label for="staffName">Trạng thái:</label>
                <select name="staff_status" id="staff_status">
                    <option value="1" <?php if ( $edit_nv->trangthai==1){echo "selected";}?> >Làm viêc</option>
                    <option value="0" <?php if ( $edit_nv->trangthai==0){echo "selected";}?> >Nghỉ việc</option>
                </select>
            </div>
            <div class="form-group" >
                <button type="submit">Cập nhật</button>
            </div>
        </form>
    </div>



@endsection('content')