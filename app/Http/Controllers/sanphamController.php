<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\danhmuc;
use App\Models\thuonghieu;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();


class sanphamController 
{
    public function add(){
        $cate =  danhmuc::all(); 
        $brand =  thuonghieu::all(); 
        return view('admin.sanpham.add_product')->with('cate', $cate)->with('brand', $brand);
    }
    public function search(request $_request){
        $key =  $_request->keyword;
        $list_product = sanpham::join('danhmuc','danhmuc.maDanhMuc','=','sanpham.danhmuc')
                                    ->join('thuonghieu','thuonghieu.maThuongHieu','=','sanpham.thuonghieu')
                                    ->where('tenSanPham', 'like','%'.$key.'%')
                                    ->orderby('maSanPham', 'DESC')
                                    ->paginate(6);
        return view('admin.sanpham.list_product')->with('list_product', $list_product);
    }
    public function list(request $_request){
        $list_product = sanpham::join('danhmuc','danhmuc.maDanhMuc','=','sanpham.danhmuc')
                                ->join('thuonghieu','thuonghieu.maThuongHieu','=','sanpham.thuonghieu')
                                ->orderby('maSanPham', 'DESC')
                                ->paginate(6);
        
        return view('admin.sanpham.list_product')->with('list_product', $list_product);
     }
     public function hienthi($maSanPham, request $_request){
        $data = $_request->all();
        $cate = sanpham::find($maSanPham);
        $cate->trangthai = 1;
        $cate->save();
        return redirect('/danhsach-sanpham');
    }
    public function an($maSanPham, request $_request){
        $data = $_request->all();
        $cate = sanpham::find($maSanPham);
        $cate->trangthai = 0;
        $cate->save();
        return redirect('/danhsach-sanpham');
    }
    public function save(request $_request){
        $data = $_request->all();
        $pro = new sanpham();

        $get_image = $_request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image)); //phân tách chuỗi
            $new_image =  $name_image.rand(0,99) . '.' . $get_image->getClientOriginalExtension();
            // $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi của ảnh
            $get_image->move('public/uploads/product', $new_image);
            $pro->anhSanPham = $new_image;
        }
        $pro->tenSanPham =  $data['product_name'];
        $pro->mota =  $data['product_desc'];
        $pro->gia =  $data['product_price'];
        $pro->thuonghieu =  $data['product_brand'];
        $pro->soluong =  $data['product_qty'];
        $pro->danhmuc =  $data['product_cate'];
        $pro->trangthai =  $data['product_status'];
        $pro->save();
        session()->put('message', 'Thêm sản phẩm thành công');
        return redirect('/them-sanpham');
    }
     public function edit($maSanPham){
        $product_cate = danhmuc::all(); 
        $product_brand =  thuonghieu::all(); 
        $edit_product = sanpham::find($maSanPham);
        return view('admin.sanpham.edit_product')->with('edit_product', $edit_product)->with('product_cate',$product_cate)->with('product_brand',$product_brand);
     }
  
     public function update(request $_request,$maSanPham){
        $data = $_request->all();
        $pro = sanpham::find($maSanPham);
        $pro->tenSanPham =  $data['product_name'];
        $pro->mota =  $data['product_desc'];
        $pro->gia =  $data['product_price'];
        $pro->thuonghieu =  $data['product_brand'];
        $pro->soluong =  $data['product_qty'];
        $pro->danhmuc =  $data['product_cate'];
        $pro->trangthai =  $data['product_status'];

         $get_image = $_request->file('product_image');
         if($get_image){
               $get_name_image = $get_image->getClientOriginalName();
               $name_image = current(explode('.',$get_name_image)); //phân tách chuỗi
               $new_image =  $name_image.rand(0,99) . '.' . $get_image->getClientOriginalExtension();
               // $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi của ảnh
               $get_image->move('public/uploads/product', $new_image);
               $pro->anhSanPham = $new_image;
               $pro->save();
        }
        $pro->save();
        session()->put('message', 'cập nhật sản phẩm thành công');
        return redirect('/danhsach-sanpham');
      }
      public function delete($maSanPham){
       
        $pro = sanpham::find($maSanPham);
        $pro->delete();
        session()->put('message', 'Xóa sản phẩm thành công');
        return redirect('/danhsach-sanpham');
     }
}
