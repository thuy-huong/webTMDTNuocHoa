<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    use HasFactory;
    public $timestamps = false; //không cho chạy thời giờ create_up
    protected $fillbale =['tenNhanVien', 'diachi', 'sodienthoai', 'email', 'matkhau' ,'trangthai'];
    protected $primaryKey = 'maNhanVien';
    protected $table    = 'nhanvien';
}
