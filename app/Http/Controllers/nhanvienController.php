<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nhanvien;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();
class nhanvienController 
{
    public function list(request $_request){
        if($key =  $_request->keyword){
            $list_nhanvien = nhanvien::where('tenNhanVien', 'like','%'.$key.'%')
                                    ->orderby('maNhanVien', 'DESC')
                                    ->paginate(6);
        }
        $list_nhanvien = nhanvien::orderby('maNhanVien','desc')->paginate(6);
        return view('admin.nhanvien.list_nhanvien')->with('list_nhanvien', $list_nhanvien);
    }
    public function add(){
        return view('admin.nhanvien.add_nhanvien');
    }
    public function save(request $_request){
        $data = $_request->all();
        $nv = new nhanvien();
        $nv->tenNhanVien = $data['staff_name'];
        $nv->diachi = $data['staff_address'];
        $nv->sodienthoai = $data['staff_phoneNumber'];
        $nv->email = $data['staff_email'];
        $nv->matkhau = $data['staff_pass'];
        $nv->trangthai = 1;
        $nv->save();
        session()->put('message', 'Thêm nhân viên thành công');
        return redirect('/themmoi-nhanvien');
    }
    public function hienthi($maNhanVien){
        $staff= nhanvien::find($maNhanVien);
        $staff->trangthai = '1';
        $staff->save();
        return redirect('/danhsach-nhanvien');
    }
    public function an($maNhanVien){
        $staff = nhanvien::find($maNhanVien);
        $staff->trangthai = '0';
        $staff->save();
        return redirect('/danhsach-nhanvien');
    }
    public function edit($maNhanVien){
        $edit_nv = nhanvien::find($maNhanVien);
        return view('admin.nhanvien.edit_nhanvien')->with('edit_nv', $edit_nv);
    }
    public function update(request $_request,$maNhanVien){
        $data = $_request->all();
        $nv = nhanvien::find($maNhanVien);
        $nv->tenNhanVien = $data['staff_name'];
        $nv->diachi = $data['staff_address'];
        $nv->sodienthoai = $data['staff_phoneNumber'];
        $nv->email = $data['staff_email'];
        $nv->matkhau = $data['staff_pass'];
        $nv->trangthai = $data['staff_status'];
        $nv->save();
        session()->put('message', 'Cập nhật nhân viên thành công');
        return redirect('/danhsach-nhanvien');
    }
    public function delete($maNhanVien){
       
        $nv = nhanvien::find($maNhanVien);
        $nv->delete();
        session()->put('message', 'Xóa nhân viên thành công');
        return redirect('/danhsach-nhanvien');
    }
}
