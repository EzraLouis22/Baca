<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RenunganController;
use App\Http\Controllers\User\UserControllerUser;
use App\Http\Controllers\User\RenunganControllerUser;
use App\Http\Controllers\User\CatatanRenunganController;

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
    return view('auth')->name('auth');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Guest routes (not authenticated)
    Route::middleware('guest:web')->group(function () {
        Route::get('login', [AuthController::class, 'index'])->name('admin.login');
        Route::post('login', [AuthController::class, 'login'])->name('admin.login.post');
    });
    
    // Authenticated admin routes
    Route::middleware('auth:web')->group(function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
        
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        
        // Resource routes
        Route::resource('users', UserController::class);
        Route::resource('renungan', RenunganController::class);
    });
});

/*
|--------------------------------------------------------------------------
| Member/User Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'member', 'as' => 'member.'], function () {
    // Guest routes (not authenticated)
    Route::middleware('guest')->group(function () {
        Route::get('login', [UserControllerUser::class, 'login'])->name('member.login');
        Route::post('login', [UserControllerUser::class, 'postLogin'])->name('member.login.post');
        Route::get('register', [UserControllerUser::class, 'register'])->name('member.register');
        Route::post('register', [UserControllerUser::class, 'postRegister'])->name('member.register.post');
    });
    
    // Authenticated member routes
    Route::middleware('auth')->group(function () {
        Route::get('logout', [UserControllerUser::class, 'logout'])->name('member.logout');
        Route::get('beranda', [RenunganControllerUser::class, 'beranda'])->name('beranda');
        Route::get('renungan', [RenunganControllerUser::class, 'index'])->name('renungan');
        
        // Catatan Renungan routes
        Route::group(['prefix' => 'catatan-renungan', 'as' => 'catatan.'], function () {
            Route::get('/', [CatatanRenunganController::class, 'index'])->name('index');
            Route::get('create', [CatatanRenunganController::class, 'create'])->name('create');
            Route::post('store', [CatatanRenunganController::class, 'store'])->name('store');
            Route::get('{id}', [CatatanRenunganController::class, 'show'])->name('show');
            Route::get('{id}/edit', [CatatanRenunganController::class, 'edit'])->name('edit');
            Route::put('{id}', [CatatanRenunganController::class, 'update'])->name('update');
            Route::delete('{id}', [CatatanRenunganController::class, 'destroy'])->name('destroy');
        });
    });
});