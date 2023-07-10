<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TahunAjaran\TahunAjaranController;
use App\Http\Controllers\Rombel\RombelController;

use App\Http\Controllers\Backend\SetupGroupController;
use App\Http\Controllers\Backend\SetupJurusanController;
use App\Http\Controllers\Backend\SetupKelasController;
use App\Http\Controllers\Backend\SetupUserRfidController;
use App\Http\Controllers\Backend\SetupAgamaController;

use App\Http\Controllers\Import\ImportController;
use App\Http\Controllers\Import\ImportGuruController;
use App\Http\Controllers\Import\ImportMapelController;
use App\Http\Controllers\Export\ExportGuruController;



use App\Http\Controllers\Frontend\FrontendController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('frontend.index');
// });


//FrontEnd

Route::get('/', [FrontendController::class,'FrontendHome'])->name('frontend.home');

Route::controller(App\Http\Controllers\Auth\AuthOtpController::class)->group(function(){
    Route::get('otp/login', 'login')->name('otp.login');
    Route::post('otp/generate', 'generate')->name('otp.generate');
    Route::get('otp/verification/{user_id}', 'verification')->name('otp.verification');
    Route::post('otp/login', 'loginWithOtp')->name('otp.getlogin');
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
    Route::prefix('admin')->group(function(){
            

        Route::get('/dashboard', [AdminController::class,'AdminDashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class,'AdminDestroy'])->name('admin.logout');
        Route::get('/profile', [AdminController::class,'AdminProfile'])->name('admin.profile');
        Route::post('/profile/store', [AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
        Route::get('/change/password', [AdminController::class,'AdminChangePassword'])->name('admin.change.password');
        Route::post('/update/password', [AdminController::class,'AdminUpdatePassword'])->name('update.password');
        Route::get('/generete/user', [AdminController::class,'genereteUser'])->name('generete.user');


        //Route Presensi
        Route::get('/presensi/lihat',[PresensiController::class,'LihatPresensi'])->name('lihat.presensi');

        //Route ExportUser
        Route::get('/user/export',[UserController::class,'ExportUser'])->name('export.user');
        Route::get('/userrfid/export',[UserController::class,'ExportUserRfid'])->name('export.userrfid');
        Route::get('/download/template/user-rfid', [UserRfidController::class,'DownloadTemplateUserRfid'])->name('download.template.user.rfid');

        //Route Import
        Route::get('/userrfid/lihat',[ImportController::class,'LihatImportUserRfid'])->name('lihat.import.userrfid');
        Route::post('/import/user-id',[ImportController::class,'ImportUserRfid'])->name('import.user.rfid');

        Route::get('/guru/lihat',[ImportController::class,'LihatImportGuru'])->name('lihat.import.guru');
        
    }); //End Group

    Route::prefix('setup')->group(function(){
        Route::controller(SetupGroupController::class)->group(function(){
            //Route Group
            Route::get('/group/lihat', 'LihatGroup')->name('lihat.group');
            Route::get('/group/tambah','TambahGroup')->name('tambah.group');
            Route::post('/group/edit/{id}','EditGroup')->name('edit.group');
            Route::post('/group/simpan','SimpanGroup')->name('simpan.group');
            Route::get('/group/update/{id}','UpdateGroup')->name('update.group');
            Route::get('/group/hapus/{id}','HapusGroup')->name('hapus.group');
        });

        Route::controller(SetupJurusanController::class)->group(function(){
             //Route Jurusan
            Route::get('/jurusan/lihat','LihatJurusan')->name('lihat.jurusan');
            Route::get('/jurusan/tambah','TambahJurusan')->name('tambah.jurusan');
            Route::get('/jurusan/edit/{id}','EditJurusan')->name('edit.jurusan');
            Route::post('/jurusan/update/{id}','UpdateJurusan')->name('update.jurusan');
            Route::post('/jurusan/simpan','SimpanJurusan')->name('simpan.jurusan');
            Route::get('/jurusan/hapus/{id}','HapusJurusan')->name('hapus.jurusan');
        });

        Route::controller(SetupKelasController::class)->group(function(){
             //Route Kelas
            Route::get('/kelas/lihat','LihatKelas')->name('lihat.kelas');
            Route::get('/kelas/tambah','TambahKelas')->name('tambah.kelas');
            Route::get('/kelas/edit/{id}','EditKelas')->name('edit.kelas');
            Route::post('/kelas/update/{id}','UpdateKelas')->name('update.kelas');
            Route::post('/kelas/simpan','SimpanKelas')->name('simpan.kelas');
            Route::get('/kelas/hapus/{id}','HapusKelas')->name('hapus.kelas');
        });

        Route::controller(SetupUserRfidController::class)->group(function(){
            Route::get('/user/lihat','Index')->name('lihat.user');Route::get('/user/delete',[UserRfidController::class,'AllDeleteUserRfid'])->name('all.delete.user.rfid');
            Route::get('/user/rfid/delete/{id}','UserRfidDelete')->name('user.rfid.delete');
            Route::get('/user/rfid/edit/{id}','UserRfidEdit')->name('user.rfid.edit');
            Route::post('/user/rfid/update','UserRfidUpdate')->name('user.rfid.update');
        });

        Route::controller(SetupAgamaController::class)->group(function(){
            Route::get('/agama/lihat','Agama')->name('lihat.agama');
            Route::get('/agama/tambah','TambahAgama')->name('tambah.agama');
            Route::get('/agama/edit/{id}','EditAgama')->name('edit.agama');
            Route::post('/agama/update/{id}','UpdateAgama')->name('update.agama');
            Route::post('/agama/simpan','SimpanAgama')->name('simpan.agama');
            Route::get('/agama/hapus/{id}','HapusAgama')->name('hapus.agama');
    
        });

        
       
       
        //Route Sekolah
        Route::get('/sekolah',[SekolahController::class,'Sekolah'])->name('sekolah');
        Route::post('/update/sekolah/',[SekolahController::class,'UpdateSekolah'])->name('update.sekolah');


       
        
        //Route Guru
        Route::get('/guru/lihat',[GuruController::class,'Index'])->name('lihat.guru');
        Route::get('/guru/tambah',[GuruController::class,'TambahGuru'])->name('tambah.guru');
        Route::get('/guru/edit/{id}',[GuruController::class,'EditGuru'])->name('edit.guru');
        Route::post('/guru/update/{id}',[GuruController::class,'UpdateGuru'])->name('update.guru');
        Route::post('/guru/simpan',[GuruController::class,'SimpanGuru'])->name('simpan.guru');
        Route::get('/guru/hapus/{id}',[GuruController::class,'HapusGuru'])->name('hapus.guru');
        Route::get('/template/guru/excel', [GuruController::class,'template_excel_guru'])->name('template.excel.guru');

        //Route Mapel
        Route::get('/mapel/lihat',[MapelController::class,'Index'])->name('lihat.mapel');
        Route::get('/template/mapel/excel', [MapelController::class,'template_excel_mapel'])->name('template.excel.mapel');

        
        
        //Route Tahun Ajaran
        Route::get('/kelas/pembelajaran',[TahunAjaranController::class,'LihatTahunAjaran'])->name('lihat.tahunajaran');

        //Route Rombongan Belajar
        Route::get('/rombel/lihat',[RombelController::class,'LihatRombel'])->name('lihat.rombel');
        Route::get('/rombel/tambah',[RombelController::class,'TambahRombel'])->name('tambah.rombel');
        Route::post('/rombel/edit/{id}',[RombelController::class,'EditRombel'])->name('edit.rombel');
        Route::post('/rombel/simpan',[RombelController::class,'SimpanRombel'])->name('simpan.rombel');
        Route::get('/rombel/update/{id}',[RombelController::class,'UpdateRombel'])->name('update.rombel');
        Route::get('/rombel/hapus/{id}',[RombelController::class,'HapusRombel'])->name('hapus.rombel');

        
        

    }); //End Group

    //Route IMPORT

    Route::prefix('import')->group(function(){
        Route::post('/guru',[ImportGuruController::class,'importGuru'])->name('import.guru');
        Route::post('/mapel',[ImportMapelController::class,'importMapel'])->name('import.mapel');


    }); //End Group

    //ROUTE EXPORT
    Route::prefix('export')->group(function(){
        Route::get('/guru',[ExportGuruController::class,'ExportGuru'])->name('export.guru');

    }); //End Group

}); //End Middleware


Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/user/dashboard', [VendorController::class,'VendorDashboard'])->name('vendor.dashboard');
});

Route::get('/admin/login', [AdminController::class,'AdminLogin'])->name('admin.login');



