<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    use HasFactory;
    public $timestamps = false; //không cho chạy thời giờ create_up
    protected $fillbale =['maDonHang', 'maSanPham', 'tenSanPham','soluong','dongia'];
    protected $primaryKey = 'maChiTietDonhang';
    protected $table    = 'chitietdonhang';
    public function donhang()
    {
        return $this->belongsTo("App\Models\donhang", 'maDonHang');
    }
    public function sanpham()
    {
        return $this->belongsTo("App\Models\sanpham", 'maSanPham');
    }

}
