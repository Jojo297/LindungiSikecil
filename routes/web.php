<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthParentsController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\ParentController;
use App\Models\InformationVaccine;
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

Route::post('user/send-whatsaap', [ParentController::class, 'sendOtp'])->name('send.otp');
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

    // kelola informasi vaksin
    Route::get('/information-vaccine', [AdminController::class, 'indexInformationVaccine'])->name('information-vaccine');
    Route::get('/detail-informasi/{id}', [AdminController::class, 'showInformation'])->name('detail.informasi');
    Route::post('/proses-tambah-informasi', [AdminController::class, 'createInformation'])->name('tambah.informasi');
    Route::get('/tambah-informasi', [AdminController::class, 'indexInformasi'])->name('index.informasi');
    Route::delete('/hapus-informasi/{id}', [AdminController::class, 'destroyInformation'])->name('hapus.informasi');
    Route::get('/edit-informasi/{id}', [AdminController::class, 'editInformation'])->name('edit.informasi');
    Route::put('/update-informasi/{id}', [AdminController::class, 'updateInformation'])->name('update.informasi');
    Route::post('/search-informasi', [AdminController::class, 'searchInformation'])->name('search.informasi');
});
// halaman admin selesai


// halaman parents
route::group(['prefix' => 'user',  'middleware' => 'auth:parent', 'as' => 'user.'], function () {
    // halaman dashboard
    Route::get('/dashboard', [ChildController::class, 'index'])->name('dashboard');
    Route::get('/schedule', [ParentController::class, 'indexSchedule'])->name('schedule');

    // halaman profile
    Route::get('/profile', [ParentController::class, 'profile'])->name('profile');
    Route::get('/profile/edit/{id}', [ParentController::class, 'editProfile'])->name('edit.profile');
    Route::put('/profile/update/', [ParentController::class, 'updateProfile'])->name('update.profile');
    Route::get('/profile/change-password', [ParentController::class, 'indexchangePassword'])->name('index.change.password');
    Route::post('/profile/change-password', [ParentController::class, 'changePassword'])->name('change.password');

    // halaman informasi vaksin
    Route::get('/information-vaccine', [ParentController::class, 'indexInformationVaccine'])->name('information-vaccine');
    Route::get('/detail-informasi/{id}', [ParentController::class, 'showInformation'])->name('detail.informasi');
    Route::post('/search-informasi', [ParentController::class, 'searchInformation'])->name('search.informasi');

    // data anak
    Route::post('/add-child', [ChildController::class, 'addChild'])->name('add.child');
    Route::get('/events', [ChildController::class, 'events'])->name('events');
});
// halaman parents selesai
