<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    public $timestamps = false; //không cho chạy thời giờ create_up
    protected $fillbale =['tenDanhMuc', 'mota', 'trangthai'];
    protected $primaryKey = 'maDanhMuc';
    protected $table    = 'danhmuc';
}
