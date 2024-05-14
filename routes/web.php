<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthParentsController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\ParentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing-page');
});

// login user
Route::get('/login', [AuthParentsController::class, 'index'])->name('login');
Route::post('user/login', [AuthParentsController::class, 'login'])->name('login.user');
Route::get('user/logout', [AuthParentsController::class, 'logout'])->name('logout.user');

Route::get('/daftar', function () {
    return view('daftar');
});

Route::post('/daftar-proses', [ParentController::class, 'register'])->name('register');
Route::get('user/otp', function () {
    return view('otp');
})->middleware('verify.register.data')->name('user.otp');
Route::post('/user/input-otp', [ParentController::class, 'virifyOtp'])->middleware('verify.register.data')->name('virifyOtp');
Route::get('user/wa', function () {
    return view('wa');
})->name('user.wa')->middleware('verify.register.data');
// ->middleware('verify.register.data')
Route::post('user/send-whatsaap', [ParentController::class, 'sendOtp'])->name('send.otp');
// Route::post('user/otp', [ParentController::class, 'CheckOtp'])->name('check.otp');
// login user selesai

// login admin
Route::get('/admin/login', [AuthAdminController::class, 'index'])->name('login.admin');

Route::post('/admin/login', [AuthAdminController::class, 'login'])->name('admin.login');

Route::get('/admin/logout', [AuthAdminController::class, 'logout'])->name('admin.logout');
// login admin selesai

// halaman admin
route::group(['prefix' => 'admin', 'middleware' => ['auth:admin'], 'as' => 'admin.'], function () {
    // dashboard admin
    Route::get('/my', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // kelola jadwal imunisasi
    Route::get('/schedule', [AdminController::class, 'indexSchedule'])->name('schedule');
    Route::post('/schedule-proses', [AdminController::class, 'insertSchedule'])->name('schedule.insert');
    Route::get('/schedules/{id_schedule}/edit', [AdminController::class, 'edit'])->name('schedules.edit');

    Route::delete('/schedule/delete/{id}', [AdminController::class, 'destroy'])->name('schedule.destroy');
});
// halaman admin selesai


// halaman parents
route::group(['prefix' => 'user',  'middleware' => 'auth:parent', 'as' => 'user.'], function () {
    // halaman dashboard
    Route::get('/dashboard', [ChildController::class, 'index'])->name('dashboard');
    Route::get('/schedule', [ParentController::class, 'indexSchedule'])->name('schedule');
});
// Route::group(['prefix' => 'user', 'middleware' => [Auth::guard('parents')], 'as' => 'user.'], function () {
//     // halaman dashboard
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
// halaman parents selesai
