<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    public $timestamps = false; //không cho chạy thời giờ create_up
    protected $fillbale =['tenKhachHang', 'diachi', 'sodienthoai', 'email', 'matkhau' ,'trangthai'];
    protected $primaryKey = 'maKhachHang';
    protected $table    = 'khachhang';
    
}
