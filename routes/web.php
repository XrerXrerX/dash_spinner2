<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisvoucherController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\GeneratevoucherController;
use App\Http\Controllers\AllowedipController;
use App\Http\Controllers\LinkSettingsController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Notes;
use Illuminate\Http\Request;


// Route::group(['middleware' => ['allowedIP']], function () {

Route::get('/', function () {


    if (Auth::check()) {
        return redirect()->intended('/superadmin');
    }

    return redirect()->intended('/login');
});


Route::get('/superadmin', function () {
    return view('index', [
        'title' => 'superadmin',
    ]);
})->middleware('auth');

// Route::get('/generatevoucher', [GenerateVoucherController::class, 'index'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('/komponen/dashboard', [
        'title' => 'superadmin',
    ]);
});
// ->Middleware(['auth', 'superadmin']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->Middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->Middleware('auth');

Route::get('/topnav', function () {
    $totalnote = Notes::count();
    return view('komponen.top_nav', ['totalnote' => $totalnote]);
})->name('topnav');


Route::get('/sidenav', function () {
    return view('komponen.side_nav');
})->name('sidenav');

Route::get('/codebox', function () {
    return view('komponen.code_box');
})->name('codebox');

Route::get('/codetable', function () {
    return view('komponen.code_table');
})->name('codetable');

Route::get('/codeform', function () {
    return view('komponen.code_form');
})->name('codeform');

Route::get('/codemodal', function () {
    return view('komponen.code_modal');
})->name('codemodal');

Route::get('/codebutton', function () {
    return view('komponen.code_button');
})->name('codebutton');

Route::get('/codecard', function () {
    return view('komponen.code_card');
})->name('codecard');

Route::get('/codeother', function () {
    return view('komponen.code_other');
})->name('codeother');

Route::get('/codetest', function () {
    return view('komponen.loader');
})->name('codetest');

Route::get('/notesview', function () {
    return view('komponen.notes');
})->name('notesview');

Route::middleware(['auth'])->group(function () {


    /*--  Voucher --*/
    Route::get('/voucher/{id}/{isdemo?}/{search_data?}', [VoucherController::class, 'index']);
    // Route::get('/voucher_search/{id}/{search_data?}', [VoucherController::class, 'index_search']);
    // Route::get('/viewtable/{id}/{search_kode?}', [VoucherController::class, 'viewtable']);
    Route::get('/voucher_search/{id}/{search_data?}', [VoucherController::class, 'index_search']);
    Route::get('/search_voucher/{id}/{search_kode?}', [VoucherController::class, 'search_voucher']);
    Route::get('/voucherproses/{id}/{isdemo?}/{search_data?}', [VoucherController::class, 'indexProses']);
    Route::get('/voucherprosesall/{search_data?}', [VoucherController::class, 'indexProsesAll']);
    Route::get('/vouchertable/{search_data?}', [VoucherController::class, 'tableProsesAll']);
    Route::post('/voucher_updatestatus', [VoucherController::class, 'updateStatus']);
    Route::post('/voucher_updateuserklaim', [VoucherController::class, 'updateUserklaim']);
    Route::post('/voucher_deleteuserklaim', [VoucherController::class, 'deleteUserklaim']);
    Route::get('/voucher_print/{id}', [VoucherController::class, 'print']);
    Route::get('/voucher_printview/{id}', [VoucherController::class, 'printView']);
    Route::get('/voucher_printproses/{id}', [VoucherController::class, 'printProses']);
    Route::get('/countvoucher', [VoucherController::class, 'countvoucher']);


    /*--  Generate Voucher --*/
    Route::get('/generatevoucher/{isdemo?}/{search_data?}', [GenerateVoucherController::class, 'index']);
    Route::get('/generatevoucherdemo/{demoid}', [GenerateVoucherController::class, 'index']);
    Route::get('/generatevoucher/view/{id}', [GenerateVoucherController::class, 'views']);
    Route::post('/generatevoucher/inputuserid/{id}', [GenerateVoucherController::class, 'inputuserid']);
    Route::get('/viewtablegenerate/{isdemo}/{search_kode?}', [GenerateVoucherController::class, 'viewtable']);

    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profile/update/', [UserController::class, 'updateProfile']);

    //Notes
    Route::get('/notes', [NotesController::class, 'index']);
    Route::get('/notes/add', [NotesController::class, 'create']);
    Route::get('/notes/edit/{id}', [NotesController::class, 'edit']);
    Route::post('/notes/store', [NotesController::class, 'store']);
    Route::post('/notes/update', [NotesController::class, 'update']);
    Route::delete('/notes/delete', [NotesController::class, 'destroy']);
    Route::get('/notes/view/{id}', [NotesController::class, 'views']);


    Route::middleware(['isAdmin'])->group(function () {
        /*--  Generate Voucher --*/
        Route::get('/generatevoucheradd/{isdemo?}/{search_data?}', [GenerateVoucherController::class, 'create']);
        Route::post('/generatevoucher/store', [GenerateVoucherController::class, 'store']);
        Route::delete('/generatevoucher/delete', [GenerateVoucherController::class, 'destroy']);

        /*--  Jenis Voucher --*/
        Route::get('/jenisvoucher', [JenisvoucherController::class, 'index']);
        Route::get('/jenisvoucher/add', [JenisvoucherController::class, 'create']);
        Route::get('/jenisvoucher/edit/{id}', [JenisvoucherController::class, 'edit']);
        Route::post('/jenisvoucher/store', [JenisvoucherController::class, 'store']);
        Route::post('/jenisvoucher/update', [JenisvoucherController::class, 'update']);
        Route::delete('/jenisvoucher/delete', [JenisvoucherController::class, 'destroy']);
        Route::get('/jenisvoucher/view/{id}', [JenisvoucherController::class, 'views']);

        /*--  Data User --*/
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/add', [UserController::class, 'create']);
        Route::get('/user/edit/{id}', [UserController::class, 'edit']);
        Route::post('/user/store', [UserController::class, 'store']);
        Route::post('/user/update', [UserController::class, 'update']);
        Route::delete('/user/delete', [UserController::class, 'destroy']);
        Route::get('/user/view/{id}', [UserController::class, 'views']);

        /*--  Allowed IP --*/
        Route::get('/allowedip', [AllowedipController::class, 'index']);
        Route::get('/allowedip/add', [AllowedipController::class, 'create']);
        Route::get('/allowedip/edit/{id}', [AllowedipController::class, 'edit']);
        Route::post('/allowedip/store', [AllowedipController::class, 'store']);
        Route::post('/allowedip/update', [AllowedipController::class, 'update']);
        Route::delete('/allowedip/delete', [AllowedipController::class, 'destroy']);
        Route::get('/allowedip/view/{id}', [AllowedipController::class, 'views']);


        Route::get('/linksettings', [LinkSettingsController::class, 'index']);
        Route::get('/linksettings/add', [LinkSettingsController::class, 'create']);
        Route::get('/linksettings/edit/{id}', [LinkSettingsController::class, 'edit']);
        Route::post('/linksettings/store', [LinkSettingsController::class, 'store']);
        Route::post('/linksettings/update', [LinkSettingsController::class, 'update']);
        Route::delete('/linksettings/delete', [LinkSettingsController::class, 'destroy']);
        Route::get('/linksettings/view/{id}', [LinkSettingsController::class, 'views']);
    });

    //LAPORAN
    // Route::get('/laporan', [LaporanController::class, 'index']);
    // Route::get('/exportlaporan', [LaporanController::class, 'generatePDF']);

    // Route::get('/test', function (Request $request) {
    //     $token = $request->session()->token();

    //     return view('rtp.test');
    // });


    Route::get('/images/{imageName}', 'App\Http\Controllers\ImageController@getImagePath');
});

Route::get('/check-session', function () {
    if (Auth::check()) {
        return response('session_active');
    } else {
        return response('session_expired');
    }
});

Route::get('/unauthorized', function () {
    return Redirect::away('#');
})->name('unauthorized');

// });
