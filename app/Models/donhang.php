<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;
    protected $fillbale =['maKhachHang', 'phuongThucTT', 'tongsotien','order_status','created_at','update_at'];
    protected $primaryKey = 'maDonhang';
    protected $table    = 'dondathang';
    // public function khachhang()
    // {
    //     return $this->belongsTo("App\Models\khachhang", 'maKhachHang');
    // }

}
