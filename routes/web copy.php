<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ApkBoController;
use App\Http\Controllers\ApkNotifikasiController;
use App\Http\Controllers\PaitoPasaranController;
use App\Http\Controllers\PaitoResultController;
use App\Http\Controllers\SyairCrudController;
use App\Http\Controllers\SyairTitleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApkContactController;
use App\Http\Controllers\ApkLinkController;
use App\Http\Controllers\ApkSettingController;
use App\Http\Controllers\ApkPemberitahuanController;
use App\Http\Controllers\RtpController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\WebPromosiController;
use App\Http\Controllers\SpinnerVoucherController;
use App\Http\Controllers\SpinnerJenisvoucherController;
use App\Http\Controllers\SpinnerGeneratevoucherController;
use App\Http\Controllers\LoginSpinnerController;

Route::get('/', function () {


    if (Auth::check()) {
        $user = Auth::user();
        if ($user->divisi == 'rtp') {
            return redirect()->intended('/rtp/dashboard');
        } elseif ($user->divisi == 'syair') {
            return redirect()->intended('/syair');
        } elseif ($user->divisi == 'paito') {
            return redirect()->intended('/paito');
        } elseif ($user->divisi == 'media') {
            return redirect()->intended('/media');
        } elseif ($user->divisi == 'apk') {
            return redirect()->intended('/apk');
        } elseif ($user->divisi == 'rtpsyair') {
            return redirect()->intended('/rtpsyair');
        } elseif ($user->divisi == 'web') {
            return redirect()->intended('/web');
        } elseif ($user->divisi == 'superadmin') {
            return redirect()->intended('/superadmin');
        } elseif ($user->divisi == 'spinner') {
            return redirect()->intended('/spinner');
        } else {
            return redirect()->intended('/login');
        }
    }

    return redirect()->intended('/login');
});

Route::get('/rtp/dashboard', function () {
    return view('dashboard.rtp.rtp', [
        'title' => 'RTP',
    ]);
})->Middleware(['auth', 'rtp']);

Route::get('/syair', function () {
    return view('dashboard.syair.syair', [
        'title' => 'SYAIR',
    ]);
})->Middleware(['auth', 'syair']);

Route::get('/paito', function () {
    return view('dashboard.paito.paito', [
        'title' => 'PAITO',
        'menu' => 'Home Paito'
    ]);
})->Middleware(['auth', 'paito']);

Route::get('/media', function () {
    return view('dashboard.media', [
        'title' => 'MEDIA',
    ]);
})->Middleware(['auth', 'media']);

Route::get('/apk', function () {
    return view('dashboard.apk.dashboard.dashboard', [
        'title' => 'APK',
    ]);
})->Middleware(['auth', 'apk']);

Route::get('/rtpsyair', function () {
    return view('dashboard.rtpsyair', [
        'title' => 'RTP & SYAIR',
    ]);
})->Middleware(['auth', 'rtpsyair']);

Route::get('/web', function () {
    return view('dashboard.web.dashboard.dashboard', [
        'title' => 'WEB',
    ]);
})->Middleware(['auth', 'web']);

Route::get('/superadmin', function () {
    return view('dashboard.superadmin.superadmin', [
        'title' => 'superadmin',
    ]);
})->Middleware(['auth', 'superadmin']);

Route::get('/spinner', function () {
    return view('dashboard.spinner.dashboard.dashboard', [
        'title' => 'SPINNER',
    ]);
})->Middleware(['auth', 'spinner']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->Middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->Middleware('auth');


Route::get('/trex1diath/register', [RegisterController::class, 'index']);
Route::post('/trex1diath/register', [RegisterController::class, 'store']);


/*------------------------------------- PAITO -------------------------------------*/
/*-- Dshboard --*/


Route::get('/CRUD/pasaran', [PaitoPasaranController::class, 'index'])->name('pasaran.index');
Route::get('/CRUD/result', [PaitoResultController::class, 'index'])->name('result.index');

Route::post('/CRUD/pasaran', [PaitoPasaranController::class, 'store'])->name('pasaran.store');
// Route::put('/CRUD/pasaran/{id}/edit', [PaitoPasaranController::class, 'update'])->name('pasaran.update');
Route::put('/CRUD/pasaran/{id}/edit', [PaitoPasaranController::class, 'update'])->Middleware(['auth', 'paito']);
Route::delete('/CRUD/pasaran/{id}/delete', [PaitoPasaranController::class, 'destroy'])->name('pasaran.delete');
Route::get('/CRUD/pasaran/{id}/data', [PaitoPasaranController::class, 'data'])->Middleware(['auth', 'paito']);

Route::post('/CRUD/result', [PaitoResultController::class, 'store'])->name('result.store');
// Route::put('/CRUD/result/{id}/edit', [PaitoResultController::class, 'update'])->name('result.update');
Route::put('/CRUD/result/{id}/edit', [PaitoResultController::class, 'update'])->Middleware(['auth', 'paito']);
Route::delete('/CRUD/result/{id}/delete', [PaitoResultController::class, 'destroy'])->name('result.destroy');
Route::get('/CRUD/result/{id}/data', [PaitoResultController::class, 'data'])->Middleware(['auth', 'paito']);





Route::resource('pasaran', PaitoPasaranController::class);

/*------------------------------------- APK -------------------------------------*/

/*-- Bo --*/
Route::get('/apk/bo', [ApkBoController::class, 'index'])->Middleware(['auth', 'apk']);
Route::get('apk/bo/data/{id}', [ApkBoController::class, 'data'])->Middleware(['auth', 'apk']);
Route::post('/apk/bo/create', [ApkBoController::class, 'store'])->Middleware(['auth', 'apk']);
Route::put('/apk/bo/update/{id}', [ApkBoController::class, 'update'])->Middleware(['auth', 'apk']);
Route::delete('/apk/bo/delete/{id}', [ApkBoController::class, 'destroy'])->Middleware(['auth', 'apk']);
Route::get('/apk/bo/searchindex', [ApkBoController::class, 'searchindex'])->middleware(['auth', 'apk'])->name('apk.bo.searchindex');

/*-- Notifikasi --*/
Route::get('/apk/notifikasi', [ApkNotifikasiController::class, 'index'])->Middleware(['auth', 'apk']);
Route::post('/apk/notifikasi/update', [ApkNotifikasiController::class, 'update'])->name('notifikasi.update')->Middleware(['auth', 'apk']);


/*-- Contact --*/
Route::get('/apk/contact', [ApkContactController::class, 'index'])->Middleware(['auth', 'apk']);
Route::post('/apk/contact/update', [ApkContactController::class, 'update'])->name('contact.update')->Middleware(['auth', 'apk']);


/*-- Link --*/
Route::get('/apk/link', [ApkLinkController::class, 'index'])->Middleware(['auth', 'apk']);
Route::get('apk/link/data/{id}', [ApkLinkController::class, 'data'])->Middleware(['auth', 'apk']);
Route::post('/apk/link/create', [ApkLinkController::class, 'create'])->Middleware(['auth', 'apk']);
Route::post('/apk/link/update/{id}', [ApkLinkController::class, 'update'])->Middleware(['auth', 'apk']);
Route::delete('/apk/link/delete/{id}', [ApkLinkController::class, 'delete'])->Middleware(['auth', 'apk']);
Route::get('/apk/link/searchindex', [ApkLinkController::class, 'searchindex'])->middleware(['auth', 'apk'])->name('apk.link.searchindex');

/*-- Setting --*/
Route::get('/apk/setting', [ApkSettingController::class, 'index'])->Middleware(['auth', 'apk']);
Route::post('/apk/setting/update', [ApkSettingController::class, 'update'])->name('setting.update')->Middleware(['auth', 'apk']);

/*-- Pemberitahuan --*/
Route::get('/apk/pemberitahuan', [ApkPemberitahuanController::class, 'index'])->Middleware(['auth', 'apk']);
Route::get('apk/pemberitahuan/data/{id}', [ApkPemberitahuanController::class, 'data'])->Middleware(['auth', 'apk']);
Route::post('/apk/pemberitahuan/create', [ApkPemberitahuanController::class, 'create'])->Middleware(['auth', 'apk']);
Route::post('/apk/pemberitahuan/update/{id}', [ApkPemberitahuanController::class, 'update'])->Middleware(['auth', 'apk']);
Route::delete('/apk/pemberitahuan/delete/{id}', [ApkPemberitahuanController::class, 'delete'])->Middleware(['auth', 'apk']);
Route::get('/apk/pemberitahuan/searchindex', [ApkPemberitahuanController::class, 'searchindex'])->middleware(['auth', 'apk'])->name('apk.pemberitahuan.searchindex');


























/*------------------------------------- SYAIR -------------------------------------*/
/*-- Dshboard --*/


Route::resource('syair/posts', SyairCrudController::class)->Middleware(['auth', 'syair']);
Route::get('syair/checkSlug', [SyairCrudController::class, 'checkSlug'])->Middleware(['auth', 'syair']);
Route::resource('syair/title', SyairTitleController::class)->Middleware(['auth', 'syair']);
Route::get('syair/posts', [SyairCrudController::class, 'index'])->Middleware(['auth', 'syair']);







/*------------------------------------- RTP -------------------------------------*/
/*-- Dshboard --*/
Route::resource('rtp/posts', RtpController::class)->Middleware(['auth', 'rtp']);
Route::get('rtp/posts/{totaldivisi:divisi}', [RtpController::class, 'show'])->Middleware(['auth', 'rtp']);
Route::get('rtp/{provider}', [RtpController::class, 'create'])->Middleware(['auth', 'rtp']);
Route::get('rtp/search/{id}', [RtpController::class, 'showsearch'])->Middleware(['auth', 'rtp']);




// Route::get('/rtp/checkSlug', [RtpController::class, 'checkSlug'])->Middleware(['auth','rtp');
// Route::resource('/rtp/title', RtpController::class)->Middleware(['auth','rtp');



















/*------------------------------------- WEB -------------------------------------*/
/*-- Dshboard --*/
Route::get('/web/promosi/searchindex', [WebPromosiController::class, 'searchindex'])->middleware(['auth', 'apk'])->name('web.promosi.searchindex');
Route::resource('/web/promosi', WebPromosiController::class)->Middleware(['auth', 'web']);
Route::get('/apk/bo/datapromosi/{id}', [WebPromosiController::class, 'datapromosi'])->Middleware(['auth', 'web']);





/*------------------------------------- SUPERADMIN -------------------------------------*/
/*-- Dshboard --*/
Route::resource('/superadmins/usertrexdiat', SuperAdminController::class)->Middleware(['auth', 'superadmin']);
Route::post('/superadmins/usertrexdiat/{post:id}', [SuperAdminController::class, 'show'])->Middleware(['auth', 'superadmin']);
Route::post('/web/promosi/deleteimage', [WebPromosiController::class, 'deleteimage'])->name('deleteimage')->Middleware(['auth', 'apk']);




/*-- Voucher --*/
Route::get('spinner/voucher/{id}/{api?}', [SpinnerVoucherController::class, 'index'])->name('spinner.voucher');
Route::get('spinner/voucher/data/{id}', [SpinnerVoucherController::class, 'data']);
Route::get('spinner/voucher/datapromosi/{id}', [SpinnerVoucherController::class, 'datapromosi']);
Route::post('spinner/voucher/create', [SpinnerVoucherController::class, 'store']);
Route::put('spinner/voucher/update/{id}', [SpinnerVoucherController::class, 'update']);
Route::delete('spinner/voucher/delete/{id}', [SpinnerVoucherController::class, 'destroy']);
Route::get('spinner/voucher/export/{id}', [SpinnerVoucherController::class, 'export'])->name('spinner.voucher.export');
Route::post('spinner/voucher/update-status/{id}', [SpinnerVoucherController::class, 'updateStatus'])->name('spinner.update-status');

/*-- Jenis Voucher --*/
Route::get('spinner/jenisvoucher', [SpinnerJenisvoucherController::class, 'index']);
Route::get('spinner/jenisvoucher/data/{id}', [SpinnerJenisvoucherController::class, 'data']);
Route::get('spinner/jenisvoucher/datapromosi/{id}', [SpinnerJenisvoucherController::class, 'datapromosi']);
Route::post('spinner/jenisvoucher/create', [SpinnerJenisvoucherController::class, 'store']);
Route::put('spinner/jenisvoucher/update/{id}', [SpinnerJenisvoucherController::class, 'update']);
Route::delete('spinner/jenisvoucher/delete/{id}', [SpinnerJenisvoucherController::class, 'destroy']);
Route::get('spinner/jenisvoucher/datavoucher/', [SpinnerJenisvoucherController::class, 'datavoucher']);




/*-- Generate Voucher --*/
Route::get('spinner/generatevoucher', [SpinnerGeneratevoucherController::class, 'index'])->name('spinner.generatevoucher');
Route::get('spinner/generatevoucher/data/{id}', [SpinnerGeneratevoucherController::class, 'data']);
Route::get('spinner/generatevoucher/datapromosi/{id}', [SpinnerGeneratevoucherController::class, 'datapromosi']);
Route::post('spinner/generatevoucher/create', [SpinnerGeneratevoucherController::class, 'store']);
Route::put('spinner/generatevoucher/update/{id}', [SpinnerGeneratevoucherController::class, 'update']);
Route::delete('spinner/generatevoucher/delete/{id}', [SpinnerGeneratevoucherController::class, 'destroy']);


/*------------------------------------- SPINNER -------------------------------------*/

Route::get('spinner/voucher/exportexcel/{id}', [SpinnerVoucherController::class, 'exportexcel'])->name('spinner.voucher.exportexcel');


Route::get('k6rilog19', function () {
    return view('spinlg.index');
});

Route::get('spinnerl21', function () {
    return view('spinlg.spinner');
});


Route::post('spinner/auth', [LoginSpinnerController::class, 'authenticate']);
