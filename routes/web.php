<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
        //Route Dahboard
    Route::get('/admin/dashboard',[DahboardController::class,'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/dashboard', [AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class,'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class,'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class,'AdminUpdatePassword'])->name('update.password');

    //Route Sekolah
    Route::get('/admin/sekolah',[SekolahController::class,'Sekolah'])->name('sekolah');
    Route::post('/admin/update/sekolah/',[SekolahController::class,'UpdateSekolah'])->name('update.sekolah');

    //Route Presensi
    Route::get('/admin/presensi/lihat',[PresensiController::class,'LihatPresensi'])->name('lihat.presensi');


});

Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/user/dashboard', [VendorController::class,'VendorDashboard'])->name('vendor.dashboard');
});

Route::get('/admin/login', [AdminController::class,'AdminLogin'])->name('admin.login');



