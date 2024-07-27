<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\thuonghieu;
use DB;
use session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;

class thuonghieuController 
{
    public function list(request $_request){
        $list_brand =thuonghieu::paginate(5);
        if($key =  $_request->keyword){
            $list_brand = thuonghieu::where('tenThuongHieu', 'like','%'.$key.'%')->paginate(5);
        }
        return view('admin.thuonghieu.list_brand')->with('list_brand', $list_brand);
    }
    public function hienthi($maThuongHieu, request $_request){
        $data = $_request->all();
        $cate = thuonghieu::find($maThuongHieu);
        $cate->trangthai = '1';
        $cate->save();
        return redirect('/danhsach-thuonghieu');
    }
    public function an($maThuongHieu, request $_request){
        $data = $_request->all();
        $cate = thuonghieu::find($maThuongHieu);
        $cate->trangthai = '0';
        $cate->save();
        return redirect('/danhsach-thuonghieu');
    }
    public function add(){
        
        return view('admin.thuonghieu.add_brand');
    }
    public function save(request $_request){
        $data = $_request->all();
        $cate = new thuonghieu();
        $cate->tenThuongHieu = $data['tenthuonghieu'];
        $cate->mota = $data['mota'];
        $cate->trangthai = $data['trangthai'];
        $cate->save();
        session()->put('message', 'Thêm thương hiệu thành công');
        return redirect('/themmoi-thuonghieu');
    }

    public function edit($maThuongHieu){
        $edit_brand = thuonghieu::find($maThuongHieu);
        return view('admin.thuonghieu.edit_brand')->with('edit_brand', $edit_brand);
    }
    public function update(request $_request,$maThuongHieu){
        $data = $_request->all();
        $cate = thuonghieu::find($maThuongHieu);
        $cate->tenThuongHieu = $data['tenthuonghieu'];
        $cate->mota = $data['mota'];
        $cate->trangthai = $data['trangthai'];
        $cate->save();
        session()->put('message', 'Cập nhật danh mục thành công');
        return redirect('/danhsach-thuonghieu');
    }
    public function delete($maThuongHieu){
       
        $cate = thuonghieu::find($maThuongHieu);
        $cate->delete();
        session()->put('message', 'Xóa danh mục thành công');
        return redirect('/danhsach-thuonghieu');
    }
}

