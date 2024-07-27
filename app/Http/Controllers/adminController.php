<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use session;
use Illuminate\Support\Facades\Redirect;


class adminController 
{
    public function baocao(){
        return view('admin.baocao');
    }
    
    public function index(){
       return view('admin.loginAdmin');
    }
    public function show_dashboard(Request $request){
        $count_customer = DB::table('khachhang')->count();
        $count_product = DB::table('sanpham')->count();
        $count_order = DB::table('dondathang')->count();
        $pro_out_of_stock =DB::table('sanpham')->where('soluong','<','5')->get();
      
        $count_pro_out_of_stock = 0;
        foreach ($pro_out_of_stock as $key =>$pro){
            $count_pro_out_of_stock ++;
        }
        // var_dump($count_pro_out_of_stock);
        $request->session()->put('count_customer', $count_customer);
        $request->session()->put('count_product', $count_product);
        $request->session()->put('count_order', $count_order);
        $request->session()->put('count_pro_out_of_stock', $count_pro_out_of_stock);
        
        $admin_id = session()->get('admin_id');
        $maNV = session()->get('maNhanVien');
        if($admin_id == true){
            return view('admin.dashboard');
        }elseif( $maNV == true){
            return view('nhanvien.dashboard');
        }  
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_matkhau = $request->matkhau;

        $result_admin = DB::table('admin')->where('email',$admin_email)->where('matkhau',$admin_matkhau)->first();
        $result_nhanvien = DB::table('nhanvien')->where('email',$admin_email)->where('matkhau',$admin_matkhau)->first();
        if($result_admin == true){
            $request->session()->put('tenAdmin', $result_admin->ten);
            $request->session()->put('admin_id', $result_admin->admin_id);
            return redirect::to('/dashboard'); 

        }elseif($result_nhanvien == true){
            $request->session()->put('tenNhanVien', $result_nhanvien->tenNhanVien);
            $request->session()->put('maNhanVien', $result_nhanvien->maNhanVien);
            return redirect::to('/dashboard');
        }
        else{
            $request->session()->put('message', 'Mật khẩu hoặc tài khoản sai!!');
            return redirect::to('/admin');
        }
    }
    public function logout(){
        $admin_id = session()->get('admin_id');
        $maNV = session()->get('maNhanVien'); 
        if($admin_id == true){
            session()->put('tenAdmin',null);
            session()->put('admin_id',null);
        }elseif($maNV == true){
            session()->put('tenNhanVien',null);
            session()->put('maNhanVien',null);
        }
       
        return redirect::to('/admin');
    }
}
