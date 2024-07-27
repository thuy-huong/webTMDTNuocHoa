<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thuonghieu extends Model
{
    use HasFactory;
    public $timestamps = false; //không cho chạy thời giờ create_up
    protected $fillbale =['tenThuongHieu', 'mota', 'trangthai'];
    protected $primaryKey = 'maThuongHieu';
    protected $table    = 'thuonghieu';
}
