<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khachhang;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();

class khachhangController 
{
   
    public function list(){
        $list_customer = khachhang::orderby('maKhachHang','desc')->get();
        return view('admin.khachhang.list_customer')->with('list_customer', $list_customer);
    }
    public function hienthi($maKhachHang, request $_request){
        $data = $_request->all();
        $cate = khachhang::find($maKhachHang);
        $cate->trangthai = '1';
        $cate->save();
        return redirect('/danhsach-khachhang');
    }
    public function an($maKhachHang, request $_request){
        $data = $_request->all();
        $cate = khachhang::find($maKhachHang);
        $cate->trangthai = '0';
        $cate->save();
        return redirect('/danhsach-khachhang');
    }



    public function show_login(){
       
        return view('pages.login');
    }
    public function check_login(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = $request->customer_password;
        $result = khachhang::where('email',$customer_email)->where('matkhau',$customer_password)->first();
        if($result == true && $result->trangthai==1){
            session()->put('tenKhachHang', $result->tenKhachHang);
            session()->put('maKhachHang', $result->maKhachHang);
            return redirect('/trang-chu');
        }elseif($result == true && $result->trangthai==0){
            session()->put('message', 'Tài khoản đã bị khóa');
            return redirect()->back();
        }
        else{
            session()->put('message', 'Mật khẩu hoặc tài khoản sai!!');
            return redirect()->back();
        }
    }
    public function logout_customer(){
        session()->put('maKhachHang',null);
        session()->put('maKhachHang',null);
        // $new_product = DB::table('tbl_product')->where('product_status','=','1')->limit(10)
        // ->orderby('tbl_product.product_id','desc')->get();
        // $cate_product = DB::table('tbl_category')->where('category_status', '=', '1')->get();
        return redirect()->back();
    }


    public function add_customer(request $_request){
        $data = $_request->all();
        $cus = new khachhang();
        $cus->tenKhachHang =  $data['customer_name'];
        $cus->email =  $data['customer_email'];
        $cus->matkhau =  $data['customer_password'];
        $cus->sodienthoai =  $data['customer_phone'];
        $cus->diachi =  $data['customer_address'];
        $cus->trangthai =  $data['customer_status'];
        $cus_tbl = khachhang::where('email','like',$data['customer_email'])->get();
        if($cus_tbl == null){
            $cus->save();
            session()->put('message', 'Đăng ký thành công, đăng nhập để tiếp tục ');   
        }else{
            session()->put('message', 'Email đã được đăng ký'); 
        }

        return redirect('/dangnhap-khachhang');
    }
}
