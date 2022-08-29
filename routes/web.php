<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\Environment\Runtime;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/about', function () {
//     return "about page";
// })->middleware(['auth'])->name('dashboard');
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/about', function () {
        return "about page";
    })->name('about');

    Route::name('unit.')->group(function () {
        Route::get('/unit', [\App\Http\Controllers\UnitController::class, 'index'])
            ->name('index');
        Route::get('/unit/create', [\App\Http\Controllers\UnitController::class, 'create'])
            ->name('create');
        Route::post('/unit', [\App\Http\Controllers\UnitController::class, 'store'])
            ->name('store');
    });

    Route::name('pegawai.')->group(function () {
        Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'index'])
        ->name('index');
        Route::get('/pegawai/create', [App\Http\Controllers\PegawaiController::class, 'create'])
        ->name('create');
        Route::post('/pegawai/store', [\App\Http\Controllers\PegawaiController::class, 'store'])
        ->name('store');
    });

    Route::get('/jabatan', [\App\Http\Controllers\JabatanController::class, 'index'])
        ->name('jabatan');
});

Route::get('helo/{namaDepan}/{namaBelakang?}', function ($namaDepan, $namaBelakang = null) { // parameter wajib dan optional
    return "Hallo {$namaDepan} {$namaBelakang}";
});


require __DIR__ . '/auth.php';
