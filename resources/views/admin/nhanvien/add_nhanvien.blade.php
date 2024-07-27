@extends('admin_layout')
@section('content')

    <div class="form-container" >
        <form id="newStaffForm" action="{{URL::to('/luu-nhanvien')}}" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center;">Thêm mới nhân viên</h2>
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
                <input type="text" id="staff_name" name="staff_name" required>
            </div>
            <div class="form-group">
                <label for="staffName">Địa chỉ:</label>
                <textarea style="resize: none" rows="3" name="staff_address" ></textarea>
            </div>
            <div class="form-group">
                <label for="staffName">Số điện thoại:</label>
                <input type="text" id="staff_phoneNumber" name="staff_phoneNumber" required>
            </div>
            <div class="form-group">
                <label for="staffName">Email:</label>
                <input type="text" id="staff_email" name="staff_email" required>
            </div>
            <div class="form-group">
                <label for="staffName">Mật khẩu:</label>
                <input type="text" id="staff_pass" name="staff_pass" required>
            </div>

            {{-- <div class="form-group">
                <label for="staffName">Trạng thái:</label>
                <select name="staff_status" id="staff_status">
                    <option value="1" selected>Đang làm</option>
                    <option value="0" >Nghỉ việc</option>
                </select>
            </div> --}}
            <div class="form-group" >
                <button type="submit">Thêm mới sản phẩm</button>
            </div>
        </form>
    </div>



@endsection('content')