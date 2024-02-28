<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientesAdminController;
use App\Http\Controllers\Admin\EmpleadosAdminController;
use App\Http\Controllers\Admin\ViajesAdminController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DownloadPDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MisViajesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViajesController;
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

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
//    Route::resource('admin-clientes', ClientesAdminController::class);
//    Route::resource('admin-empleados', EmpleadosAdminController::class);
//    Route::resource('admin-viajes', ViajesAdminController::class);
//    Route::resource('admin',AdminController::class);

    Route::resource('admin/clientes', ClientesAdminController::class)->names('admin.clientes');
    Route::resource('admin/empleados', EmpleadosAdminController::class)->names('admin.empleados');
    Route::resource('admin/viajes', ViajesAdminController::class)->names('admin.viajes');

    Route::get('admin/index', [AdminController::class,'index'])->name('admin.index');
    Route::post('admin/clientes/filtro', [ClientesAdminController::class,'filtro'])->name('admin.clientes.filtro');
});


Route::get('mis-viajes', [MisViajesController::class,'index'])->name('mis-viajes');
Route::get('viajes', [ViajesController::class,'index'])->name('viajes');

Route::controller(DownloadController::class)->group(callback: function () {
//    Route::get('download/image/cliente/{nif}', 'downloadImageCliente')->name('download.image.cliente');
    Route::get('show/image/{type}/{id}', 'showImage')->name('show.image');
});



require __DIR__.'/auth.php';
