<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TinhController;
use App\Http\Controllers\LoaiTourController;
use App\Http\Controllers\DiaDiemController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ChiTietTourController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ChuongTrinhTouControllerr;
use App\Http\Controllers\PhieuDatController;

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

// trang chủ
Route::get('/', [PageController::class, 'index'])->name('trangchu');
Route::get('/trangchu', [PageController::class, 'index'])->name('trangchu');


// trang chi tiet tour
Route::get('/chitiettour/{id}', [PageController::class, 'chitiettour'])->name('chitiettour');

// trang loại tour
Route::get('/loaitour/{id}', [PageController::class, 'loaitour'])->name('loaitour');

// đăng nhập
Route::get('/dangnhap', [PageController::class, 'getDangnhap'])->name('dangnhap');
Route::post('/dangnhap', [PageController::class, 'postDangnhap'])->name('post-dangnhap');

// đăng xuất
Route::get('/dangxuat', [PageController::class, 'getDangxuat'])->name('dangxuat');

// đăng ký
Route::get('/dangky', [PageController::class, 'getDangky'])->name('dangky');
Route::post('/dangky', [PageController::class, 'postDangky'])->name('post-dangky');

// người dùng
Route::get('/nguoidung', [PageController::class, 'getNguoidung'])->name('nguoidung');
Route::post('/nguoidung', [PageController::class, 'postNguoidung'])->name('postNguoidung');

// đổi mật khẩu
Route::get('/doimatkhau', [PageController::class, 'getDoiMatKhau'])->name('doimatkhau');
Route::post('/doimatkhau', [PageController::class, 'postDoiMatKhau'])->name('post-doimatkhau');

// tìm kiếm
Route::get('/tim-kiem', [PageController::class, 'TimKiem'])->name('timkiem');

//đặt tour
Route::get('/dat-tour/{id}', [PhieuDatController::class, 'getPhieuDat'])->name('dattour');
Route::post('/dat-tour/{id}', [PhieuDatController::class, 'postPhieuDat'])->name('dattour');





// Route::get('/admin', [HomeController::class, 'index'])->name('home');

Auth::routes();
 Route::get('logout', [HomeController::class, 'getDangXuat'])->name('logout');

Route::prefix('admin')->middleware('adminLogin')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
   
    // user
    Route::prefix('user')->name('users.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('edit/{id}', [UserController::class, 'postEdit']);

        Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');

    });

    // tỉnh
    Route::prefix('tinh')->name('tinh.')->group(function(){
       Route::get('/', [TinhController::class, 'index'])->name('index');
       Route::get('/add', [TinhController::class, 'addTinh'])->name('add');
       Route::post('/add', [TinhController::class, 'postaddTinh']);
       Route::get('/edit/{id}', [TinhController::class, 'getEditTinh'])->name('edit');
       Route::post('/update', [TinhController::class, 'postEditTinh'])->name('post-edit');
       Route::get('/delete/{id}', [TinhController::class, 'deleteTinh'])->name('delete');
    });

    // loai tour
     Route::prefix('loaitour')->name('loaitour.')->group(function(){
       Route::get('/', [LoaiTourController::class, 'index'])->name('index');
       Route::get('/add', [LoaiTourController::class, 'addLoaiTour'])->name('add');
       Route::post('/add', [LoaiTourController::class, 'postaddLoaiTour']);
       Route::get('/edit/{id}', [LoaiTourController::class, 'getEditLoaiTour'])->name('edit');
       Route::post('/update', [LoaiTourController::class, 'postEditLoaiTour'])->name('post-edit');
       Route::get('/delete/{id}', [LoaiTourController::class, 'deleteLoaiTour'])->name('delete');
    });

    // Địa điểm
     Route::prefix('diadiem')->name('diadiem.')->group(function(){
       Route::get('/', [DiaDiemController::class, 'index'])->name('index');
       Route::get('/add', [DiaDiemController::class, 'addDiaDiem'])->name('add');
       Route::post('/add', [DiaDiemController::class, 'postaddDiaDiem']);
       Route::get('/edit/{id}', [DiaDiemController::class, 'getEditDiaDiem'])->name('edit');
       Route::post('/update', [DiaDiemController::class, 'postEditDiaDiem'])->name('post-edit');
       Route::get('/delete/{id}', [DiaDiemController::class, 'deleteDiaDiem'])->name('delete');
    });

    // Tour
     Route::prefix('tour')->name('tour.')->group(function(){
       Route::get('/', [TourController::class, 'index'])->name('index');
       Route::get('/add', [TourController::class, 'addTour'])->name('add');
       Route::post('/add', [TourController::class, 'postaddTour']);
       Route::get('/edit/{id}', [TourController::class, 'getEditTour'])->name('edit');
       Route::post('/update', [TourController::class, 'postEditTour'])->name('post-edit');
       Route::get('/delete/{id}', [TourController::class, 'deleteTour'])->name('delete');
    });

     // Chương trình tour
     Route::prefix('chuongtrinhtour')->name('chuongtrinhtour.')->group(function(){
       Route::get('/', [ChuongTrinhTouControllerr::class, 'index'])->name('index');
       Route::get('/add', [ChuongTrinhTouControllerr::class, 'addChuongTrinhTour'])->name('add');
       Route::post('/add', [ChuongTrinhTouControllerr::class, 'postaddChuongTrinhTour'])->name('post-add');
       Route::get('/edit/{id}', [ChuongTrinhTouControllerr::class, 'getEditChuongTrinhTour'])->name('edit');
       Route::post('/update', [ChuongTrinhTouControllerr::class, 'postEditChuongTrinhTour'])->name('post-edit');
       Route::get('/delete/{id}', [ChuongTrinhTouControllerr::class, 'deleteChuongTrinhTour'])->name('delete');
    });

     // chi tiết tour
     Route::prefix('chitiettour')->name('chitiettour.')->group(function(){
       Route::get('/', [ChiTietTourController::class, 'index'])->name('index');
       Route::get('/add', [ChiTietTourController::class, 'addChiTietTour'])->name('add');
       Route::post('/add', [ChiTietTourController::class, 'postaddChiTietTour'])->name('post-add');
      //  Route::get('/edit/{id}', [TourController::class, 'getEditTour'])->name('edit');
      //  Route::post('/update', [TourController::class, 'postEditTour'])->name('post-edit');
      //  Route::get('/delete/{id}', [TourController::class, 'deleteTour'])->name('delete');
    });
    
});