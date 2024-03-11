<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PrintController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\PengirimSuratController;
use App\Http\Controllers\Admin\PenerimaSuratController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartemenController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\ArsipKaryawanController;
use App\Http\Controllers\Admin\DokumentasiController;

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

Route::get('/storage-link', function () {
    $targetFolder = base_path() . '/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});

Route::get('/clear-cache', function () {
    Artisan::call('route:cache');
});

Route::get('/', [LoginController::class, 'index']);

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Admin
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('/departemen', DepartemenController::class);
        Route::resource('/pengirim', PengirimSuratController::class);
        Route::resource('/penerima', PenerimaSuratController::class);
        Route::put('letter/surat-masuk/{id}/approve_doc', [SuratController::class, 'approve_doc'])->name('approve-doc');
        Route::resource('/letter', SuratController::class, [
            'except' => ['show']
        ]);

        Route::resource('/kategori', KategoriController::class);

        Route::resource('/employee', KaryawanController::class);

        Route::resource('/arsip-karyawan', ArsipKaryawanController::class);
        Route::get('/arsip-karyawan/download/{id}', [ArsipKaryawanController::class, 'download_archive'])->name('download-arsip-karyawan');

        Route::resource('/documentation', DokumentasiController::class);
        Route::get('/documentation/download/{id}', [DokumentasiController::class, 'download_archive'])->name('download-arsip-dokumentasi');

        Route::get('letter/surat-masuk', [SuratController::class, 'incoming_mail'])->name('surat-masuk');
        Route::get('letter/surat-keluar', [SuratController::class, 'outgoing_mail'])->name('surat-keluar');

        Route::post('letter/approval/{id}', [SuratController::class, 'approval_letter'])->name('approval');
        Route::post('letter/notification/{id}', [SuratController::class, 'goToNotification'])->name('notification');



        Route::get('letter/surat/{id}', [SuratController::class, 'show'])->name('detail-surat');
        Route::put('letter/surat/{id}', [SuratController::class, 'update_komentar'])->name('detail-surat');
        Route::put('letter/surat/{id}/dokumen', [SuratController::class, 'update_dokumen'])->name('upload-dokumen-surat');
        Route::get('letter/download/{id}', [SuratController::class, 'download_letter'])->name('download-surat');

        //print
        Route::get('print/surat-masuk', [PrintController::class, 'index'])->name('print-surat-masuk');
        Route::get('print/surat-keluar', [PrintController::class, 'outgoing'])->name('print-surat-keluar');
        Route::match(['GET', 'POST'], 'print/arsip-karyawan', [PrintController::class, 'employeeArchive']);
        Route::match(['GET', 'POST'], 'print/dokumentasi', [PrintController::class, 'dokumentasi']);

        Route::resource('user', UserController::class);
        Route::resource('setting', SettingController::class, [
            'except' => ['show']
        ]);
        Route::get('setting/password', [SettingController::class, 'change_password'])->name('change-password');
        Route::post('setting/upload-profile', [SettingController::class, 'upload_profile'])->name('profile-upload');
        Route::post('change-password', [SettingController::class, 'update_password'])->name('update.password');

        Route::post('read-notif', [SettingController::class, 'read_notification'])->name('read-notif');
    });
