<?php

use Illuminate\Http\Request;
use App\Models\donhang;

use Illuminate\Support\Facades\Redirect;


class dondathangController 
{
    public function list(){
        $list_order = donhang::join('khachhang','khachhang.maKhachHang','=','donhang.maKhachHang')
        ->select('donhang.*', 'khachhang.tenKhachHang')
        ->orderby('donhang.madonHang','desc')->get();
        return view('admin.donhang.list_order')->with('list_order', $list_order);
   }
}
