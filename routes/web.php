<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Backend\SetupGroupController;
use App\Http\Controllers\Backend\SetupJurusanController;
use App\Http\Controllers\Backend\SetupKelasController;
use App\Http\Controllers\Backend\SetupUserRfidController;
use App\Http\Controllers\Backend\SetupAgamaController;
use App\Http\Controllers\Backend\SetupTahunAjaranController;
use App\Http\Controllers\Backend\SetupGuruController;
use App\Http\Controllers\Backend\SetupRombelController;
use App\Http\Controllers\Backend\SetupMataPelajaranController;
use App\Http\Controllers\Backend\SetupPeserta_didikController;
use App\Http\Controllers\Backend\SetupJadwalPelajaranController;
use App\Http\Controllers\Backend\SetupBobotPelanggaranController;

use App\Http\Controllers\Backend\SettingMapingController;
use App\Http\Controllers\Backend\SettingAnggotaRombelController;
use App\Http\Controllers\Backend\SettingPengumumanController;

use App\Http\Controllers\Guru\GuruController;

use App\Http\Controllers\Backend\Presensi\PresensiSholatController;

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
        
        Route::controller(PresensiSholatController::class)->group(function(){
            Route::get('/presensi/sholat/lihat','LihatPresensiSholat')->name('lihat.presensi.sholat');
            Route::get('/presensi/sholat/tambah','TambahPresensiSholat')->name('tambah.presensi.sholat');
            Route::post('/presensi/sholat/simpan','SimpanPresensiSholat')->name('simpan.presensi.sholat');
        });


    }); //End Group Admin
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
            Route::post('/import/jurusan','ImportJurusan')->name('import.jurusan');
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
            Route::get('/user-rfid','Index')->name('lihat.user');
            Route::get('/user-rfid/delete','AllDeleteUserRfid')->name('all.delete.user.rfid');
            Route::get('/user-rfid/delete/{id}','UserRfidDelete')->name('user.rfid.delete');
            Route::get('/user-rfid/edit/{id}','UserRfidEdit')->name('user.rfid.edit');
            Route::post('/user-rfid/update','UserRfidUpdate')->name('user.rfid.update');
        });

        Route::controller(SetupPeserta_didikController::class)->group(function(){
            Route::get('/lihat/peserta-didik','lihatPeserta_didik')->name('lihat.peserta_didik');
            Route::get('/peserta-didik/delete','AllDeletePeserta_didik')->name('all.delete.user.peserta_didik');
            Route::get('/edit/peserta-didik/{id}','EditPeserta_didik')->name('edit.peserta.didik');
             Route::post('/peserta-didik/update','UpdatePeserta_didik')->name('update.peserta_didik');
            Route::get('/peserta-didik/rfid/delete/{id}','Peserta_didikDelete')->name('peserta_didik.delete');
            Route::get('/peserta-didik/edit/{id}','UserPeserta_didik')->name('peserta_didik.edit');
            // Route::post('/peserta-didik/update','Peserta_didikUpdate')->name('peserta_didik.update');
            Route::post('/import/peserta-didik','ImportPeserta_didik')->name('import.peserta_didik');
        });

        Route::controller(SetupAgamaController::class)->group(function(){
            Route::get('/agama/lihat','Agama')->name('lihat.agama');
            Route::get('/agama/tambah','TambahAgama')->name('tambah.agama');
            Route::get('/agama/edit/{id}','EditAgama')->name('edit.agama');
            Route::post('/agama/update/{id}','UpdateAgama')->name('update.agama');
            Route::post('/agama/simpan','SimpanAgama')->name('simpan.agama');
            Route::get('/agama/hapus/{id}','HapusAgama')->name('hapus.agama');
    
        });  

        Route::controller(SetupTahunAjaranController::class)->group(function(){
            //Route Tahun Ajaran
        Route::get('/ta','LihatTahunAjaran')->name('lihat.tahunajaran');
        Route::get('/ta/tambah','TahunPelajaranTambah')->name('tahun.pelajaran.tambah');
        Route::post('/ta/simpan','TahunPelajaranSimpan')->name('tahun.pelajaran.simpan');
        Route::get('/ta/hapus/{id}','TahunPelajaranHapus')->name('tahun.pelajaran.Hapus');
        }); 

        Route::controller(SetupGuruController::class)->group(function(){
            //Route Guru
            Route::get('/guru/lihat','Index')->name('lihat.guru');
            Route::get('/guru/tambah','TambahGuru')->name('tambah.guru');
            Route::get('/guru/edit/{id}','EditGuru')->name('edit.guru');
            Route::post('/guru/update/{id}','UpdateGuru')->name('update.guru');
            Route::post('/guru/simpan','SimpanGuru')->name('simpan.guru');
            Route::get('/guru/hapus/{id}','HapusGuru')->name('hapus.guru');
            Route::get('/template/guru/excel', 'template_excel_guru')->name('template.excel.guru');
            Route::get('/guru/delete','AllDeleteGuru')->name('all.delete.guru');
            Route::get('/guru/generate','GuruGenerate')->name('guru.generate');
            Route::get('/siswa/generate','SiswaGenerate')->name('siswa.generate');
            Route::get('/guru/user/lihat','LihatUserGuru')->name('lihat.user.guru');
            Route::get('/siswa/user/lihat','LihatUserSiswa')->name('lihat.user.siswa');
            Route::get('/guru/user/hapus/{id}','HapusUserGuru')->name('hapus.user.guru');
            Route::post('/import/guru','importGuru')->name('import.guru');

        
        });  

        Route::controller(SetupRombelController::class)->group(function(){
            //Route Rombongan Belajar
            Route::get('/rombel/lihat','LihatRombel')->name('lihat.rombel');
            Route::get('/rombel/tambah','TambahRombel')->name('tambah.rombel');
            Route::post('/rombel/edit/{id}','EditRombel')->name('edit.rombel');
            Route::post('/rombel/simpan','SimpanRombel')->name('simpan.rombel');
            Route::get('/rombel/update/{id}','UpdateRombel')->name('update.rombel');
            Route::get('/rombel/hapus/{id}','HapusRombel')->name('hapus.rombel');
            Route::post('/import/rombel','ImportRombel')->name('import.rombel');

            Route::get('/anggota-rombel','LihatAnggotaRombel')->name('lihat.anggota.rombel');
        });

        Route::controller(SettingAnggotaRombelController::class)->group(function(){
            Route::get('/anggota-rombel','LihatAnggotaRombel')->name('lihat.anggota.rombel');
        });    

        Route::controller(SetupMataPelajaranController::class)->group(function(){
            //Route Mapel
        Route::get('/mapel/lihat','Index')->name('lihat.mapel');
        Route::get('/template/mapel/excel', 'template_excel_mapel')->name('template.excel.mapel');
        }); 

        Route::controller(SetupJadwalPelajaranController::class)->group(function(){
            //Route Jadwal_Pelajaran
        Route::get('/jadwal','lihatJadwal_pelajaran')->name('lihat.jadwal.pelajaran');
        Route::post('/jadwal/simpan','simpanJadwal_pelajaran')->name('simpan.jadwal.pelajaran');
        Route::post('/jadwal/edit/{id}','editJadwal_pelajaran')->name('edit.jadwal.pelajaran');
        Route::get('/jadwal/hapus/{id}','hapusJadwal_pelajarran')->name('hapus.jadwal.pelajaran');
        }); 

        Route::controller(SetupBobotPelanggaranController::class)->group(function(){
            //Route SetupBobotPelanggaranController
        Route::get('/bobot-pelanggaran','lihatBobot_pelanggaran')->name('lihat.bobot.pelanggaran');
        Route::post('/bobot-pelanggaran-simpan','simpanBobot_pelanggaran')->name('simpan.bobot.pelanggaran');
        Route::post('/bobot-pelanggaran-edit/{id}','editBobot_pelanggaran')->name('edit.bobot.pelanggaran');
        Route::get('/bobot-pelanggaran-hapus/{id}','hapusBobot_pelanggaran')->name('hapus.bobot.pelanggaran');

        Route::post('/import/bobot-pelanggaran','ImportBobot_pelanggaran')->name('import.bobot.pelanggaran');
        }); 
    


        
       
        //Route Sekolah
        Route::get('/sekolah',[SekolahController::class,'Sekolah'])->name('sekolah');
        Route::post('/update/sekolah/',[SekolahController::class,'UpdateSekolah'])->name('update.sekolah');
        
        

          
        
        

    }); //End Group
    Route::prefix('setting')->group(function(){  

        Route::controller(SettingMapingController::class)->group(function(){
            //Route Mapel
        Route::get('/maping/pembelajaran','settingMapingPembelajaran')->name('setting.maping.pembelajaran');
        Route::post('/maping/pembelajaran/simpan','settingMapingPembelajaranSimpan')->name('setting.maping.pembelajaran.simpan');

        Route::get('/maping/pembelajaran/get','getKelasMaping')->name('get.kelas.maping');
        Route::post('/import/anggota-rombel','importAnggota_rombel')->name('import.anggota.rombel');

        });  


        Route::controller(SettingPengumumanController::class)->group(function(){
            //Route Pengumuman
        Route::get('/pengumuman','lihatPengumuman')->name('lihat.pengumuman');
        Route::post('/pengumuman/simpan','simpanPengumuman')->name('simpan.pengumuman');
        Route::post('/pengumuman/edit/{id}','edetPengumuman')->name('edit.pengumuman');
        Route::get('/pengumuman/hapus/{id}','hapusPengumuman')->name('hapus.pengumuman');
        }); 
    }); 

    //Route IMPORT

    Route::prefix('import')->group(function(){
        
        Route::post('/mapel',[ImportMapelController::class,'importMapel'])->name('import.mapel');


    }); //End Group

    //ROUTE EXPORT
    Route::prefix('export')->group(function(){
        Route::get('/guru',[ExportGuruController::class,'ExportGuru'])->name('export.guru');

    }); //End Group

}); //End Middleware Admin


Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/user/dashboard', [VendorController::class,'VendorDashboard'])->name('vendor.dashboard');
});

Route::get('/admin/login', [AdminController::class,'AdminLogin'])->name('admin.login');
Route::get('/guru/login', [GuruController::class,'GuruLogin'])->name('guru.login');


Route::middleware(['auth','role:guru'])->group(function(){
    Route::prefix('guru')->group(function(){
        Route::controller(GuruController::class)->group(function(){
        Route::get('/dashboard','GuruDashboard')->name('guru.dashboard');
        Route::get('/logout','GuruDestroy')->name('guru.logout');
        Route::get('/profile', 'GuruProfile')->name('guru.profile');
        Route::post('/profile/store','GuruProfileStore')->name('guru.profile.store');
        Route::get('/change/password','GuruChangePassword')->name('guru.change.password');
        Route::post('/update/password','GuruUpdatePassword')->name('guru.update.password');
        Route::get('/lihat/presensi/sholat','guruLihatPresensiSholat')->name('guru.lihat.presensi.sholat');
        });
    });
 });

