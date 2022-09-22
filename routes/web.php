<?php

use App\Http\Controllers\Mahasiswa\MahasiswaController;
use App\Http\Controllers\Biasa\BiasaController;
use App\Http\Controllers\Sarpras\SarprasController;
use App\Http\Controllers\Keuangan\KeuanganController;
use App\Http\Controllers\Akademik\AkademikController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Developer\DeveloperController;
use Illuminate\Support\Facades\Route;

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
})->middleware(['auth', 'user-access:Biasa'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'index'])->middleware(['auth:mahasiswa'])->name('mahasiswa.dashboard');

require __DIR__.'/mahasiswaauth.php';

Route::group(['middleware' => ['auth:mahasiswa'], 'prefix'=>'mahasiswa','as'=>'mahasiswa.'], function(){
    Route::get('profile', [MahasiswaController::class, 'profile'])->name('profile');
    // Route::get('absen', [MahasiswaController::class, 'absen'])->name('absen');
    Route::get('absen/{jadwalkuliah:slug}', [MahasiswaController::class, 'absen'])->name('absen');
    Route::post('absen-action', [MahasiswaController::class, 'absenaction'])->name('absen-action');
    Route::post('update-data', [MahasiswaController::class, 'updatedata'])->name('update-data');
    Route::post('update-info', [MahasiswaController::class, 'updateinfo'])->name('update-info');
    Route::post('update-simple', [MahasiswaController::class, 'updatesimple'])->name('update-simple');
});

  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Biasa'])->group(function () {
  
    // Route::get('/dashboard', [BiasaController::class, 'index'])->name('dashboard');
});
  
/*------------------------------------------
--------------------------------------------
All Sarpras Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Sarpras'])->group(function () {
  
    Route::get('/sarpras/dashboard', [SarprasController::class, 'index'])->name('sarpras.dashboard');
});
/*------------------------------------------
--------------------------------------------
All Keuangan Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Keuangan'])->group(function () {
  
    Route::get('/keuangan/dashboard', [KeuanganController::class, 'index'])->name('keuangan.dashboard');
});
/*------------------------------------------
--------------------------------------------
All Akademik Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Akademik'])->group(function () {
  
    Route::get('/akademik/dashboard', [AkademikController::class, 'index'])->name('akademik.dashboard');
    Route::resource('/akademik/mahasiswa', App\Http\Controllers\Developer\MahasiswaController::class);
    Route::resource('/akademik/prodi', App\Http\Controllers\Developer\ProdiController::class);
    Route::resource('/akademik/kelas', App\Http\Controllers\Developer\KelasController::class);
});
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Admin'])->group(function () {
  
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
  
/*------------------------------------------
--------------------------------------------
All Developer Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:Developer'])->group(function () {
  
    Route::get('/developer/dashboard', [DeveloperController::class, 'index'])->name('developer.dashboard');
    Route::get('/developer/mahasiswa-export', [App\Http\Controllers\Developer\MahasiswaController::class, 'export'])->name('mahasiswa.export');
    Route::post('/developer/mahasiswa-import', [App\Http\Controllers\Developer\MahasiswaController::class, 'import'])->name('mahasiswa.import');
    Route::get('/developer/mahasiswa-teknikinformatika', [App\Http\Controllers\Developer\MahasiswaController::class, 'teknikinformatika'])->name('mahasiswa.teknikinformatika');
    Route::get('/developer/mahasiswa-sisteminformasi', [App\Http\Controllers\Developer\MahasiswaController::class, 'sisteminformasi'])->name('mahasiswa.sisteminformasi');
    Route::get('/developer/mahasiswa-rekayasaperangkatlunak', [App\Http\Controllers\Developer\MahasiswaController::class, 'rekayasaperangkatlunak'])->name('mahasiswa.rekayasaperangkatlunak');
    Route::get('/developer/mahasiswa-manajemeninformasi', [App\Http\Controllers\Developer\MahasiswaController::class, 'manajemeninformasi'])->name('mahasiswa.manajemeninformasi');
    Route::get('/developer/mahasiswa-komputerisasiakuntansi', [App\Http\Controllers\Developer\MahasiswaController::class, 'komputerisasiakuntansi'])->name('mahasiswa.komputerisasiakuntansi');
    Route::resource('/developer/mahasiswa', App\Http\Controllers\Developer\MahasiswaController::class);
    Route::resource('/developer/prodi', App\Http\Controllers\Developer\ProdiController::class);
    Route::resource('/developer/kelas', App\Http\Controllers\Developer\KelasController::class);
    Route::resource('/developer/karyawan', App\Http\Controllers\Developer\KaryawanController::class);
    Route::resource('/developer/ruangan', App\Http\Controllers\Developer\RuanganController::class);
    // Route::resource('/developer/inventaris/barang', App\Http\Controllers\Developer\InventarisBarangController::class);
    // Route::resource('/developer/ruangan/inventaris', App\Http\Controllers\Developer\InventarisRuanganController::class);
    Route::resource('/developer/matakuliah', App\Http\Controllers\Developer\MataKuliahController::class);
    Route::resource('/developer/jadwalkuliah', App\Http\Controllers\Developer\JadwalKuliahController::class);
    Route::resource('/developer/absenmahasiswa', App\Http\Controllers\Developer\AbsenMahasiswaController::class);

    Route::get('/developer/absen/{jadwalkuliah:slug}', [App\Http\Controllers\Developer\JadwalKuliahController::class, 'absen'])->name('index');
    // Route::get('/developer/absen/{jadwalkuliah:slug}', [App\Http\Controllers\Developer\JadwalKuliahController::class, 'absen'])->name('index');
});
