<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use App\Models\Memo;
use App\Models\Sktm;
use App\Models\User;
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
Route::get('load-jabatan', [UserController::class, 'loadJabatan']);
Route::get('load-kategori', [UserController::class, 'loadKategori']);
Route::get('kategori-surat', [SuratController::class, 'loadKategori'])->name('kategori-surat');
Route::get('dashboard', function () {
    $user = User::all()->count();
    $sktmNow = Sktm::with('user')->where('created_at', '=', date("Y-m-d H:i:s"))->get()->count();
    $sktm = Sktm::all()->count();
    $memo = Memo::all()->count();
    // return $user;
    return view('sekretaris.dashboard', ['user' => $user, 'sktm' => $sktm, 'sktmNow' => $sktmNow, 'memo' => $memo]);
})->name('dashboard');

Route::middleware(['auth', 'role:Sekretaris'])->group(function () {
    Route::post('store-sktm', [SuratController::class, 'store'])->name('store-sktm');

    Route::get('input-surat', function () {
        return view('sekretaris.input-surat');
    })->name('input-surat');

    Route::get('registrasi-anggota', function () {
        return view('sekretaris.keanggotaan.registrasi');
    })->name('registrasi-anggota');

    // SURAT KELUAR
    Route::get('form-sktm', function () {
        return view('user.surat.form-sktm');
    })->name('form-sktm');
    Route::get('form-skbm', function () {
        return view('sekretaris.surat-keluar.belum-menikah');
    })->name('form-skbm');
    Route::get('form-skck', function () {
        return view('sekretaris.surat-keluar.skck');
    })->name('form-skck');
    Route::get('form-skik', function () {
        return view('sekretaris.surat-keluar.skik');
    })->name('form-skik');
    Route::get('form-skl', function () {
        return view('sekretaris.surat-keluar.skl');
    })->name('form-skl');

    // FIND SURAT
    Route::get('find-skbm', [SuratController::class, 'findSkbm']);

    // SAVE SURAT KELUAR
    Route::post('save-skbm', [SuratController::class, 'saveSkbm']);

    // GET CURRENT CATEGORY
    Route::get('find-category', [SuratController::class, 'findCategory']);

    // LOAD SURAT
    Route::get('load-arsip-surat', [SuratController::class, 'loadArsipSurat'])->name('load-all-letter');

    // GET LAST NUMBER
    Route::get('get-last-skbm', [SuratController::class, 'getLastSkbm']);

    // ARSIP
    Route::get('arsip-surat-keluar', function () {
        return view('sekretaris.arsip-sk');
    })->name('arsip-surat-keluar');


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
    Route::put('update-surat', [SuratController::class, 'update'])->name('update');
    // ARSIP ROUTE
    Route::get('arsip', function () {
        return view('sekretaris.arsip.arsip');
    })->name('arsip');
    // Route::get('rekap-arsip', [ArsipController::class, 'getArsip'])->name('rekap-arsip');
    Route::post('store-arsip', [ArsipController::class, 'store'])->name('store-arsip');
});

Route::middleware(['auth'])->group(function () {
    Route::get('rekap-arsip', [ArsipController::class, 'getArsip'])->name('rekap-arsip');
    Route::get('detail-arsip', [ArsipController::class, 'detailArsip'])->name('detail-arsip');
    Route::get('selected-arsip', [ArsipController::class, 'selectedArsip'])->name('selected-arsip');
    Route::get('data-anggota', [UserController::class, 'dataAnggota'])->name('data-anggota');

    Route::get('rekap-SKTM', [SuratController::class, 'loadSktm'])->name('rekap-sktm');

    Route::get('detail-user', [UserController::class, 'detailUser']);
    Route::get('print-pdf/{id}', [SuratController::class, 'printPDF'])->name('print-pdf');
    Route::get('/', function () {
        return redirect()->route('dashboard');
    })->name('home');
    Route::get('report', function () {
        return view('report');
    });
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
});

Route::middleware(['auth', 'role:Kepala Desa'])->group(function () {
    // Route::get('dashboard', function () {
    //     return view('sekretaris.dashboard');
    // })->name('dashboard');
    Route::get('list-memo', [MemoController::class, 'getMemo'])->name('list-memo');
    Route::get('detail-memo', [MemoController::class, 'detailMemo'])->name('detail-memo');
    // ARSIP
});
