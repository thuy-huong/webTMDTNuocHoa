<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\thuonghieu;
use App\Models\sanpham;
use session;
use Illuminate\Support\Facades\Redirect;
session_start();


class HomeController 
{
    public function index(){
        $cate =  danhmuc::orderby('maDanhMuc','desc')
        ->where('trangthai', '=', '1')->get(); 
        $brand = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 
        
        $product_Chanel = sanpham::where('thuonghieu','=','2')->get();
        $product_Dior = sanpham::where('thuonghieu','=','1')->get();
        $product_ck = sanpham::where('thuonghieu','=','3')->get();
 
        $new_product = sanpham::where('trangthai','=','1')->limit(4)
        ->orderby('maSanPham','desc')->get();
        
        return view('pages.home')->with('cate', $cate)->with('brand', $brand)
        ->with('product_Chanel',$product_Chanel)
        ->with('product_Dior',$product_Dior)
        ->with('product_ck',$product_ck)
        ->with('new_product',$new_product);
    }
    public function  sanpham(){
        $list_product = sanpham::join('danhmuc','danhmuc.maDanhMuc','=','sanpham.danhmuc')
                                ->join('thuonghieu','thuonghieu.maThuongHieu','=','sanpham.thuonghieu')->get();
        $cate =  danhmuc::orderby('maDanhMuc','desc')
        ->where('trangthai', '=', '1')->get(); 
        
        $brand = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 
        $brand2 = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 
        return view('pages.product')->with('cate', $cate)->with('brand', $brand)->with('brand2', $brand2)
        ->with('list_product', $list_product);
    }
    public function  search( request $_request){
        $key =  $_request->keyWord;
        $list_product = sanpham::join('danhmuc','danhmuc.maDanhMuc','=','sanpham.danhmuc')
                                ->join('thuonghieu','thuonghieu.maThuongHieu','=','sanpham.thuonghieu')
                                ->where('tenSanPham', 'like','%'.$key.'%')
                                ->get();
        $cate =  danhmuc::orderby('maDanhMuc','desc')
        ->where('trangthai', '=', '1')->get(); 
        
        $brand = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 
        $brand2 = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 
        return view('pages.product')->with('cate', $cate)->with('brand', $brand)->with('brand2', $brand2)
        ->with('list_product', $list_product);
    }
    public function  chitietsanpham($maSanPham){
        $list_product = sanpham::join('danhmuc','danhmuc.maDanhMuc','=','sanpham.danhmuc')
                                ->join('thuonghieu','thuonghieu.maThuongHieu','=','sanpham.thuonghieu')->get();
        $cate =  danhmuc::orderby('maDanhMuc','desc')
        ->where('trangthai', '=', '1')->get(); 
        
        $brand = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 
        $details_product = sanpham::join('danhmuc','danhmuc.maDanhMuc','=','sanpham.danhmuc')
                                ->join('thuonghieu','thuonghieu.maThuongHieu','=','sanpham.thuonghieu')
                               ->find($maSanPham);
        $maDanhMuc = $details_product->danhmuc;
        $maThuonghieu = $details_product->thuonghieu;
        $related_products = sanpham::where('danhmuc',$maDanhMuc  )->get();
        return view('pages.product_detail')->with('cate', $cate)->with('brand', $brand)
        ->with('list_product', $list_product)->with('details_product', $details_product)
        ->with('related_products', $related_products);
    }
    public function sanpham_danhmuc($maDanhMuc){
        $list_product = sanpham::join('danhmuc','danhmuc.maDanhMuc','=','sanpham.danhmuc')
                                ->join('thuonghieu','thuonghieu.maThuongHieu','=','sanpham.thuonghieu')
                                ->where('danhmuc',$maDanhMuc)
                                ->get();
        $cate =  danhmuc::orderby('maDanhMuc','desc')
        ->where('trangthai', '=', '1')->get(); 
        $brand = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 
        $brand2 = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 
        return view('pages.product')->with('cate', $cate)->with('brand', $brand)->with('brand2', $brand2)
        ->with('list_product', $list_product);
    }
    public function sanpham_thuonghieu($maThuongHieu){
        $list_product = sanpham::join('danhmuc','danhmuc.maDanhMuc','=','sanpham.danhmuc')
                                ->join('thuonghieu','thuonghieu.maThuongHieu','=','sanpham.thuonghieu')
                                ->where('thuonghieu',$maThuongHieu)
                                ->get();
        $cate =  danhmuc::orderby('maDanhMuc','desc')
        ->where('trangthai', '=', '1')->get(); 
        $brand = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 
        $brand2 = thuonghieu::orderby('maThuongHieu','desc')
        ->where('trangthai', '=', '1')->get(); 
        return view('pages.product')->with('cate', $cate)->with('brand', $brand)->with('brand2', $brand2)
        ->with('list_product', $list_product);
    }
}
