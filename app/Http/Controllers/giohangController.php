<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\thuonghieu;
use App\Models\sanpham;
use App\Models\khachhang;
use App\Models\donhang;
use App\Models\chitietdonhang;
use Carbon\Carbon;
use DB;
use Cart;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();

class giohangController 
{
    public function list_order(){
        $list_order = donhang::join('khachhang','khachhang.maKhachHang','=','dondathang.maKhachHang')
        ->select('dondathang.*', 'khachhang.tenKhachHang')
        ->orderby('dondathang.maDonHang','desc')->get();
        return view('admin.donhang.list_order')->with('list_order', $list_order);
   }
   
    public function accept_order($maDonHang){
            
        DB::table('dondathang')->where('maDonHang',$maDonHang)->update(['order_status' => '2']);
        return redirect('/danhsach-donhang');
    }
    public function delivery_order($maDonHang){
        
        DB::table('dondathang')->where('maDonHang',$maDonHang)->update(['order_status' => '3']);
        return redirect('/danhsach-donhang');
    }
    public function order_detail($maDonHang){
        $orderById = donhang::join('Khachhang','KhachHang.maKhachHang','=','dondathang.maKhachHang')->find($maDonHang);
        $product =chitietdonhang::join('dondathang','dondathang.maDonHang','=','chitietdonhang.maDonHang')
        ->where('chitietdonhang.maDonHang','=',$maDonHang)->get();
        return view('admin.donhang.order_detail')
        ->with('orderById', $orderById)
        ->with('product', $product);
    }

    public function save(request $_request){
        $productId = $_request->product_id_hidden;
        $productQty = $_request->amount;

        $product_infor =  sanpham::find( $productId);
        $data['id'] = $productId;
        $data['qty'] =   $productQty;
        $data['name'] = $product_infor->tenSanPham;
        $data['price'] = $product_infor->gia;
        $data['weight'] =  '123';
        $data['options']['image'] =  $product_infor->anhSanPham;
         
        Cart::add($data);
        Cart::setGlobalTax(0.3);
        return redirect('/giohang');
    }
    public function show_cart(){
        $cate =  danhmuc::orderby('maDanhMuc','desc')
        ->where('trangthai', '=', '1')->get(); 
        
        $brand = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 

        return view('pages.show_cart')->with('cate', $cate)->with('brand', $brand);
    }
    public function delete_to_cart($rowId){
        cart::update($rowId,0);
        return redirect('/giohang');
    }
    public function update_cart_qty(request $_request){
        $rowId = $_request->rowId_cart;
        $qty = $_request->cart_quantity;
        cart::update( $rowId,  $qty);
        return redirect('/giohang');
    }
    public function payment(){
        $cate =  danhmuc::orderby('maDanhMuc','desc')
        ->where('trangthai', '=', '1')->get(); 
        
        $brand = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 

        $customer_id_ss = session()->get('maKhachHang');
        $shipping_customer = khachhang::find($customer_id_ss);
          
        // echo '<pre>';
        // print_r( $customer );
        // echo '</pre>';
        return view('pages.payment')->with('cate', $cate)->with('brand', $brand)
        ->with('shipping_customer', $shipping_customer);
    }
    public function update_cus(Request $request, $maKhachHang){
        $data = $request->all();
        $cus = khachhang::find($maKhachHang);
        $cus->tenKhachHang =  $data['shipping_name'];
        $cus->diachi =  $data['shipping_address'];
        $cus->sodienthoai =  $data['shipping_phone'];
        // $cus->email =  $data['shipping_email'];
        $cus->save();
      
        return redirect('/thanhtoan');

    }
    public function order_place(Request $request){
       
        //insert order
        $data_order = array();
        $data_order['maKhachHang']  = session()->get('maKhachHang');
        $data_order['phuongThucTT'] =  $request->payment_option;
        $data_order['tongsotien'] = Cart::total(0,',', '.');
        $data_order['order_status'] = '1';
        $data_order['created_at'] = Carbon::now()->toDateTimeString();
        $data_order['updated_at'] = Carbon::now()->toDateTimeString();
        $maDonHang = DB::table('dondathang')->insertGetId($data_order);
       
        // insert order_details
        $content = Cart::content();
        $data_order_details = array();
        foreach($content as $v_content){
            $data_order_details['maDonHang'] = $maDonHang;
            $data_order_details['maSanPham'] = $v_content->id;
            $data_order_details['tenSanPham'] = $v_content->name;
            $data_order_details['dongia'] = $v_content->price;
            $data_order_details['soluong'] = $v_content->qty;
            DB::table('chitietdonhang')->insert($data_order_details);

            $pro = sanpham::find($v_content->id);
            $pro->soluong =  ($pro->soluong - $v_content->qty);
            $pro->save();
        }

        
        if($data_order['phuongThucTT']==1){
            Cart::destroy();
            $cate =  danhmuc::orderby('maDanhMuc','desc')
            ->where('trangthai', '=', '1')->get(); 
            
            $brand = thuonghieu::orderby('maThuongHieu','desc')
            ->where('trangthai', '=', '1')->get();
            return view('pages.handcash')->with('cate', $cate)->with('brand', $brand);
        }else{
            Cart::destroy();
            echo 'Chuyển khoản';
        }
            
    }
}
