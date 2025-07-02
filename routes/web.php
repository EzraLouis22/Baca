<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RenunganController;
use App\Http\Controllers\Admin\UserControllerUser;
use App\Http\Controllers\Admin\RenunganControllerUser;
use App\Http\Controllers\Admin\CatatanRenunganController;
use RealRashid\SweetAlert\Facades\Alert;


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
    return view('login');
})->name('root');

//Route Baca
Route::group(['prefix' => 'admin'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('admin.auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.auth.logout');
    Route::get('/register', [UserControllerUser::class, 'register'])->name('user.auth.register');
    Route::post('/register', [UserControllerUser::class, 'postRegister'])->name('user.auth.postRegister');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('admin.dashboard');
        Route::resource('users', UserController::class);
        // Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::resource('renungan', RenunganController::class);
    });
});

Route::group(['prefix' => 'member'], function () {
    Route::group(['middleware' => 'auth:member'], function () {
        Route::get('/beranda', [RenunganControllerUser::class, 'beranda'])->name('user.auth.beranda');
        Route::get('/renungans', [RenunganControllerUser::class, 'index'])->name('user.renungans.index');
        Route::get('/catatan-renungan', [CatatanRenunganController::class, 'index'])->name('user.catatan.index');
        Route::get('/catatan-renungan/create', [CatatanRenunganController::class, 'create'])->name('user.catatan.create');
        Route::post('/catatan-renungan', [CatatanRenunganController::class, 'store'])->name('user.catatan.store');
        Route::get('/catatan-renungan/{catatanRenungan}/edit', [CatatanRenunganController::class, 'edit'])->name('user.catatan.edit');
        Route::put('/catatan-renungan/{catatanRenungan}', [CatatanRenunganController::class, 'update'])->name('user.catatan.update');
        Route::delete('/catatan-renungan/{catatanRenungan}', [CatatanRenunganController::class, 'destroy'])->name('user.catatan.destroy');
        Route::get('/profile', [UserControllerUser::class, 'profile'])->name('user.auth.profile');
        Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
    });
});

// // Route User
// Route::group(['prefix' => 'user'], function () {
//     Route::get('/login', [UserControllerUser::class, 'login'])->name('user.auth.login');
//     Route::post('/login', [UserControllerUser::class, 'postLogin'])->name('user.auth.postLogin');
//     Route::get('/logout', [UserControllerUser::class, 'logout'])->name('user.logout');
//     Route::get('/register', [UserControllerUser::class, 'register'])->name('user.auth.register');
//     Route::post('/register', [UserControllerUser::class, 'postRegister'])->name('user.auth.postRegister');
//     Route::get('/beranda', [RenunganControllerUser::class, 'beranda'])->name('user.auth.beranda');
//     Route::get('/renungan', [RenunganControllerUser::class, 'index'])->name('user.renungans.index');
//     Route::get('/catatan-renungan', [CatatanRenunganController::class, 'index'])->name('user.catatan.index');
//     Route::post('/catatan-renungan', [CatatanRenunganController::class, 'create'])->name('user.catatan.create');
// });