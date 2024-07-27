<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\danhmuc;
use session;
use Illuminate\Support\Facades\Redirect;

class danhMucController 
{
    public function list(request $_request){
        
        $list_category = danhmuc::paginate(5);
        if($key =  $_request->keyword){
            $list_category = danhmuc::where('tenDanhMuc', 'like','%'.$key.'%')->paginate(5);
        }
        return view('admin.danhmuc.list_category')->with('list_category', $list_category);
     }
    public function hienthi($maDanhMuc, request $_request){
        
        $data = $_request->all();
        $cate = danhmuc::find($maDanhMuc);
        $cate->trangthai = '1';
        $cate->save();
        return redirect('/danhsach-danhMuc');
    }
    public function an($maDanhMuc, request $_request){
        $data = $_request->all();
        $cate = danhmuc::find($maDanhMuc);
        $cate->trangthai = '0';
        $cate->save();
        return redirect('/danhsach-danhMuc');
    }
    public function add(){
        
        return view('admin.danhmuc.add_category');
    }
    public function save(request $_request){
        $data = $_request->all();
        $cate = new danhmuc();
        $cate->tenDanhMuc = $data['tendanhmuc'];
        $cate->mota = $data['mota'];
        $cate->trangthai = $data['trangthai'];
        $cate->save();
        session()->put('message', 'Thêm danh mục thành công');
        return redirect('/themmoi-danhmuc');
    }

    public function edit($maDanhMuc){
        $edit_category = danhmuc::find($maDanhMuc);
        return view('admin.danhmuc.edit_category')->with('edit_category', $edit_category);
    }
    public function update(request $_request,$maDanhMuc){
        $data = $_request->all();
        $cate = danhmuc::find($maDanhMuc);
        $cate->tenDanhMuc = $data['tendanhmuc'];
        $cate->mota = $data['mota'];
        $cate->trangthai = $data['trangthai'];
        $cate->save();
        session()->put('message', 'Cập nhật danh mục thành công');
        return redirect('/danhsach-danhMuc');
     }
    public function delete($maDanhMuc){
       
        $cate = danhmuc::find($maDanhMuc);
        $cate->delete();
        session()->put('message', 'Xóa danh mục thành công');
        return redirect('/danhsach-danhMuc');
    }
}
