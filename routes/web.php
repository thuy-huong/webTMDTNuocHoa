<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\danhMucController;
use App\Http\Controllers\thuonghieuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\sanphamController;
use App\Http\Controllers\nhanvienController;
use App\Http\Controllers\khachhangController;
use App\Http\Controllers\giohangController;
use App\Http\Controllers\dondathangController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
///front_end
Route::get('/', [HomeController::class,'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/sanpham', [HomeController::class, 'sanpham']);
Route::get('/sanpham-chitiet/{maSanPham}', [HomeController::class, 'chitietsanpham']);
Route::get('sanpham-danhmuc/{maDanhMuc}',[HomeController::class, 'sanpham_danhmuc']);
Route::get('sanpham-thuonghieu/{maThuongHieu}',[HomeController::class, 'sanpham_thuonghieu']);
Route::post('/timkiem', [HomeController::class, 'search']);

Route::get('/login', [HomeController::class, 'login_checkout']);

Route::get('/dangnhap-khachhang', [khachhangController::class, 'show_login']);
Route::post('/check-login', [khachhangController::class, 'check_login']);
Route::post('/them-khachhang', [khachhangController::class, 'add_customer']);
Route::get('/dangxuat-khachhang', [khachhangController::class, 'logout_customer']);


//giỏ hàng
Route::post('/save-cart', [giohangController::class, 'save']);
Route::get('/giohang', [giohangController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [giohangController::class, 'delete_to_cart']);
Route::post('/update-cart-qty', [giohangController::class, 'update_cart_qty']);
Route::get('/thanhtoan', [giohangController::class, 'payment']);
Route::post('/order-place', [giohangController::class, 'order_place']);
Route::post('/update-cus/{maKhachHang}', [giohangController::class, 'update_cus']);


//backend admin
Route::get('/admin', [adminController::class, 'index']);
Route::get('/dashboard', [adminController::class, 'show_dashboard']);
Route::post('/admin_dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/baocao', [AdminController::class, 'baocao']);


//đơn hàng
Route::get('/danhsach-donhang', [giohangController::class, 'list_order']);
Route::get('/accept-order/{maDonHang}', [giohangController::class, 'accept_order']);
Route::get('/delivery-order/{maDonHang}', [giohangController::class, 'delivery_order']);
Route::get('/chitiet-donhang/{maDonHang}', [giohangController::class, 'order_detail']);

//khách hàng
Route::get('/danhsach-khachhang', [khachhangController::class, 'list']);
Route::get('/hienthi-khachhang/{maKhachHang}', [khachhangController::class, 'hienthi']);
Route::get('/an-khachhang/{maKhachHang}', [khachhangController::class, 'an']);

//nhân viên
Route::get('/danhsach-nhanvien', [nhanvienController::class, 'list']);

Route::get('/themmoi-nhanvien', [nhanvienController::class, 'add']);
Route::post('/luu-nhanvien', [nhanvienController::class, 'save']);

Route::get('/hienthi-nhanvien/{maNhanVien}', [nhanvienController::class, 'hienthi']); // cho nhân viên làm việc
Route::get('/an-nhanvien/{maNhanVien}', [nhanvienController::class, 'an']); //cho nhân viên nghỉ viêc

Route::get('/sua-nhanvien/{maNhanVien}', [nhanvienController::class, 'edit']);
Route::post('/capnhat-nhanvien/{maNhanVien}', [nhanvienController::class, 'update']);

Route::get('/xoa-nhanvien/{maNhanVien}', [nhanvienController::class, 'delete']);


///sản phẩm
Route::get('/danhsach-sanpham', [sanphamController::class, 'list']);
Route::get('/hienthi-sanpham/{maSanPham}', [sanphamController::class, 'hienthi']);
Route::get('/an-sanpham/{maSanPham}', [sanphamController::class, 'an']);

Route::get('/them-sanpham', [sanphamController::class, 'add']);
Route::post('/luu-sanpham', [sanphamController::class, 'save']);
Route::get('/timkiem-sanpham', [sanphamController::class, 'search']);

Route::get('/sua-sanpham/{maSanPham}', [sanphamController::class, 'edit']);
Route::get('/xoa-sanpham/{maSanPham}', [sanphamController::class, 'delete']);
Route::post('/update-sanpham/{maSanPham}', [sanphamController::class, 'update']);

// Route::get('/hienthi/{maSanPham}', [sanphamController::class, 'hienthi']);
// Route::get('/an/{maSanPham}', [sanphamController::class, 'an']);


//danh mục
Route::get('/danhsach-danhMuc', [danhMucController::class, 'list']);
Route::get('/hienthi-danhmuc/{maDanhMuc}', [danhMucController::class, 'hienthi']);
Route::get('/an-danhmuc/{maDanhMuc}', [danhMucController::class, 'an']);

Route::get('/themmoi-danhmuc', [danhMucController::class, 'add']);
Route::post('/save-category', [danhMucController::class, 'save']);

Route::get('/sua-danhmuc/{maDanhMuc}', [danhMucController::class, 'edit']);
Route::post('/update-category/{maDanhMuc}', [danhMucController::class, 'update']);

Route::get('/xoa-danhmuc/{maDanhMuc}', [danhMucController::class, 'delete']);

//thương hiệu
Route::get('/danhsach-thuonghieu', [thuonghieuController::class, 'list']);
Route::get('/hienthi-thuonghieu/{maThuongHieu}', [thuonghieuController::class, 'hienthi']);
Route::get('/an-thuonghieu/{maThuongHieu}', [thuonghieuController::class, 'an']);

Route::get('/themmoi-thuonghieu', [thuonghieuController::class, 'add']);
Route::post('/save-brand', [thuonghieuController::class, 'save']);

Route::get('/sua-thuonghieu/{maThuongHieu}', [thuonghieuController::class, 'edit']);
Route::post('/update-brand/{maThuongHieu}', [thuonghieuController::class, 'update']);

Route::get('/xoa-thuonghieu/{maThuongHieu}', [thuonghieuController::class, 'delete']);
