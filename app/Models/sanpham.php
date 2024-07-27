<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    public $timestamps = false; //không cho chạy thời giờ create_up
    protected $fillbale =['anhSanPham', 'tenSanPham', 'mota', 'gia','thuonghieu', 'soluong', 'danhmuc','trangthai' ];
    protected $primaryKey = 'maSanPham';
    protected $table    = 'sanpham';
    public function danhmuc()
    {
        return $this->belongsTo("App\Models\danhmuc", 'maDanhMuc');
    }
    public function thuonghieu()
    {
        return $this->belongsTo("App\Models\thuonghieu", 'maThuongHieu');
    }

}
