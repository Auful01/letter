<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth', 'role:Sekretaris'])->group(function () {
    Route::get('load-jabatan', [UserController::class, 'loadJabatan']);
    Route::post('store-sktm', [SuratController::class, 'store'])->name('store-sktm');
    Route::get('dashboard', function () {
        return view('sekretaris.dashboard');
    })->name('dashboard');
    Route::get('registrasi-anggota', function () {
        return view('sekretaris.keanggotaan.registrasi');
    })->name('registrasi-anggota');
    Route::get('form-sktm', function () {
        return view('user.surat.form-sktm');
    })->name('form-sktm');

    Route::post('register-anggota', [UserController::class, 'registerAnggota']);

    // MEMO ROUTE
    Route::get('memo', function () {
        return view('sekretaris.memo.memo');
    })->name('memo');

    Route::post('save-memo', [MemoController::class, 'store'])->name('save-memo');


    // SURAT ROUTE
    Route::get('detail-surat', [SuratController::class, 'detailSurat'])->name("detail-surat");
    Route::delete('hapus-surat', [SuratController::class, 'hapusSurat'])->name("hapus-surat");
    Route::get('selected-date', [SuratController::class, 'selectedDate'])->name("selected-date");

    // ARSIP ROUTE
    Route::get('arsip', function () {
        return view('sekretaris.arsip.arsip');
    })->name('arsip');
    // Route::get('rekap-arsip', [ArsipController::class, 'getArsip'])->name('rekap-arsip');
    Route::post('store-arsip', [ArsipController::class, 'store'])->name('store-arsip');
});

Route::get('rekap-arsip', [ArsipController::class, 'getArsip'])->name('rekap-arsip');
Route::get('detail-arsip', [ArsipController::class, 'detailArsip'])->name('detail-arsip');
Route::get('selected-arsip', [ArsipController::class, 'selectedArsip'])->name('selected-arsip');
Route::get('data-anggota', [UserController::class, 'dataAnggota'])->name('data-anggota');

Route::get('rekap-SKTM', [SuratController::class, 'loadSktm'])->name('rekap-sktm');

Route::get('print-pdf', [SuratController::class, 'printPDF'])->name('print-pdf');

Route::middleware(['auth', 'role:Kepala Desa'])->group(function () {
    Route::get('dashboard', function () {
        return view('sekretaris.dashboard');
    })->name('dashboard');
    Route::get('list-memo', [MemoController::class, 'getMemo'])->name('list-memo');
    Route::get('detail-memo', [MemoController::class, 'detailMemo'])->name('detail-memo');
    // ARSIP
    Route::get('load-jabatan', [UserController::class, 'loadJabatan']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
