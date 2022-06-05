<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use App\Models\Identitas;
use App\Models\Memo;
use App\Models\Sktm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
Route::get('load-profile', [UserController::class, 'loadProfile']);
Route::post('update-profile', [UserController::class, 'updateProfile']);
Route::get('dashboard', function () {
    $user = User::all()->count();
    $sktmNow = DB::select('SELECT COUNT(id) as id FROM identitas WHERE DATE(created_at) = DATE(NOW())');
    // $sktmNow = Identitas::where('created_at', '=', date('Y-m-d'))->count();
    $sktm = Identitas::all()->count();
    $memo = Memo::all()->count();
    // return $user;
    return view('sekretaris.dashboard', ['user' => $user, 'sktm' => $sktm, 'memo' => $memo], compact('sktmNow'));
})->name('dashboard');



Route::middleware(['auth', 'role:Sekretaris'])->group(function () {
    Route::post('store-sktm', [SuratController::class, 'store'])->name('store-sktm');

    Route::get('buat-surat', function () {
        return view('sekretaris.input-surat');
    })->name('buat-surat');

    Route::get('registrasi-anggota', function () {
        return view('sekretaris.keanggotaan.registrasi');
    })->name('registrasi-anggota');

    // SURAT KELUAR
    Route::get('form-sktm', function () {
        return view('sekretaris.surat-keluar.sktm');
    })->name('form-sktm');

    Route::get('form-skbm', function () {
        return view('sekretaris.surat-keluar.belum-menikah');
    })->name('form-skbm');

    Route::get('form-umkm', function () {
        return view('sekretaris.surat-keluar.umkm');
    })->name('form-umkm');

    Route::get('form-skdu', function () {
        return view('sekretaris.surat-keluar.skdu');
    })->name('form-skdu');

    Route::get('form-sp', function () {
        return view('sekretaris.surat-keluar.surat-pengantar');
    })->name('form-sp');

    Route::get('form-skck', function () {
        return view('sekretaris.surat-keluar.skck');
    })->name('form-skck');

    Route::get('form-skik', function () {
        return view('sekretaris.surat-keluar.skik');
    })->name('form-skik');

    Route::get('form-skiu', function () {
        return view('sekretaris.surat-keluar.izin-usaha');
    })->name('form-skiu');

    Route::get('form-spm', function () {
        return view('sekretaris.surat-keluar.makam');
    })->name('form-spm');

    Route::get('form-skl', function () {
        return view('sekretaris.surat-keluar.skl');
    })->name('form-skl');

    Route::get('form-skn', function () {
        return view('sekretaris.surat-keluar.skn');
    })->name('form-skn');

    Route::get('form-skpn', function () {
        return view('sekretaris.surat-keluar.skpn');
    })->name('form-skpn');

    Route::get('form-skpm', function () {
        return view('sekretaris.surat-keluar.skpm');
    })->name('form-skpm');

    Route::get('form-sk', function () {
        return view('sekretaris.surat-keluar.surat-kuasa');
    })->name('form-sk');

    // REPORT PRINT
    Route::get('report-print', [SuratController::class, 'reportPrint'])->name('report-print');
    Route::get('report-arsip', [SuratController::class, 'reportArsip'])->name('report-arsip');
    // FIND SURAT
    Route::get('find-skbm', [SuratController::class, 'findSkbm']);
    Route::get('find-skl', [SuratController::class, 'findSkl']);
    Route::get('find-skck', [SuratController::class, 'findSkck']);
    Route::get('find-skik', [SuratController::class, 'findSkik']);
    Route::get('find-skiu', [SuratController::class, 'findSkiu']);
    Route::get('find-sp', [SuratController::class, 'findSp']);
    Route::get('find-sk', [SuratController::class, 'findSk']);
    Route::get('find-skpn', [SuratController::class, 'findSkpn']);
    Route::get('find-skpm', [SuratController::class, 'findSkpm']);
    Route::get('find-umkm', [SuratController::class, 'findUmkm']);
    Route::get('find-sktm', [SuratController::class, 'findSktm']);
    Route::get('find-skn', [SuratController::class, 'findSkn']);
    Route::get('find-skdu', [SuratController::class, 'findSkdu']);
    Route::get('find-spm', [SuratController::class, 'findSpm']);

    // PRINT SURAT
    Route::get('print-skbm', [SuratController::class, 'printSkbm']);
    Route::get('print-skl', [SuratController::class, 'printSkl']);
    Route::get('print-skck', [SuratController::class, 'printSkck']);
    Route::get('print-skik', [SuratController::class, 'printSkik']);
    Route::get('print-skiu', [SuratController::class, 'printSkiu']);
    Route::get('print-sp', [SuratController::class, 'printSp']);
    Route::get('print-skpn', [SuratController::class, 'printSkpn']);
    Route::get('print-sk', [SuratController::class, 'printSk']);
    Route::get('print-skpm', [SuratController::class, 'printSkpm']);
    Route::get('print-sktm', [SuratController::class, 'printSktm']);
    Route::get('print-skn', [SuratController::class, 'printSkn']);
    Route::get('print-umkm', [SuratController::class, 'printUmkm']);
    Route::get('print-skdu', [SuratController::class, 'printSkdu']);
    Route::get('print-spm', [SuratController::class, 'printSpm']);

    // DELETE SURAT
    Route::delete('hapus', [SuratController::class, 'hapus']);

    // SAVE SURAT KELUAR
    Route::post('save-skbm', [SuratController::class, 'saveSkbm']); //FIXED
    Route::post('save-skl', [SuratController::class, 'saveSkl']); //FIXED
    Route::post('save-skck', [SuratController::class, 'saveSkck']); //FIXED
    Route::post('save-skik', [SuratController::class, 'saveSkik']); //FIXED
    Route::post('save-skiu', [SuratController::class, 'saveSkiu']); //FIXED
    Route::post('save-sp', [SuratController::class, 'saveSp']); //FIXED
    Route::post('save-skpn', [SuratController::class, 'saveSkpn']); //FIXED
    Route::post('save-sk', [SuratController::class, 'saveSk']); //FIXED
    Route::post('save-skpm', [SuratController::class, 'saveSkpm']); //FIXED
    Route::post('save-umkm', [SuratController::class, 'saveUmkm']); //FIXED
    Route::post('save-sktm', [SuratController::class, 'saveSktm']); //FIXED
    Route::post('save-skn', [SuratController::class, 'saveSkn']);
    Route::post('save-skdu', [SuratController::class, 'saveSkdu']);
    Route::post('save-spm', [SuratController::class, 'saveSpm']);

    // UpdATE SKBM
    Route::post('update-skbm', [SuratController::class, 'updateSkbm']);
    Route::post('update-skl', [SuratController::class, 'updateSkl']);
    Route::post('update-skck', [SuratController::class, 'updateSkck']);
    Route::post('update-skik', [SuratController::class, 'updateSkik']);
    Route::post('update-skiu', [SuratController::class, 'updateSkiu']);
    Route::post('update-sp', [SuratController::class, 'updateSp']);
    Route::post('update-skpn', [SuratController::class, 'updateSkpn']);
    Route::post('update-sk', [SuratController::class, 'updateSk']);
    Route::post('update-skpm', [SuratController::class, 'updateSkpm']);
    Route::post('update-sktm', [SuratController::class, 'updateSktm']);
    Route::post('update-skn', [SuratController::class, 'updateSkn']);
    Route::post('update-umkm', [SuratController::class, 'updateUmkm']);
    Route::post('update-skdu', [SuratController::class, 'updateSkdu']);
    Route::post('update-spm', [SuratController::class, 'updateSpm']);

    // GET CURRENT CATEGORY
    Route::get('find-category', [SuratController::class, 'findCategory']);

    // LOAD SURAT
    Route::get('load-arsip-surat', [SuratController::class, 'loadArsipSurat'])->name('load-all-letter');

    // GET LAST NUMBER
    Route::get('get-last-skbm', [SuratController::class, 'getLastSkbm']); //FIXED
    Route::get('get-last-sktm', [SuratController::class, 'getLastSktm']);
    Route::get('get-last-skl', [SuratController::class, 'getLastSkl']); //FIXED
    Route::get('get-last-skck', [SuratController::class, 'getLastSkck']); //FIXED
    Route::get('get-last-skik', [SuratController::class, 'getLastSkik']); //FIXED
    Route::get('get-last-skiu', [SuratController::class, 'getLastSkiu']);
    Route::get('get-last-sp', [SuratController::class, 'getLastSp']);
    Route::get('get-last-skpn', [SuratController::class, 'getLastSkpn']);
    Route::get('get-last-skpm', [SuratController::class, 'getLastSkpm']);
    Route::get('get-last-umkm', [SuratController::class, 'getLastUmkm']);
    Route::get('get-last-skn', [SuratController::class, 'getLastSkn']);
    Route::get('get-last-skdu', [SuratController::class, 'getLastSkdu']);
    Route::get('get-last-spm', [SuratController::class, 'getLastSpm']);

    // ARSIP
    Route::get('arsip-surat-keluar', function () {
        return view('sekretaris.arsip-sk');
    })->name('arsip-surat-keluar');

    Route::post('update-arsip', [ArsipController::class, 'updateArsip']);

    Route::post('register-anggota', [UserController::class, 'registerAnggota']);

    // MEMO ROUTE
    Route::get('memo', function () {
        return view('sekretaris.memo.memo');
    })->name('memo');

    Route::get('last-memo', [MemoController::class, 'getLastMemo']);

    Route::post('save-memo', [MemoController::class, 'store'])->name('save-memo');

    // LOAD TTD
    Route::get('load-ttd', [SuratController::class, 'loadTtd']);

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
    Route::delete('hapus-user', [UserController::class, 'hapusUser']);
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
