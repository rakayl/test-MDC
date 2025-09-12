<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Livewire\PendaftaranForm;
use App\Livewire\PendaftaranQueue;
use App\Livewire\MonitorQueue;
use App\Livewire\AdminUmum;
use App\Livewire\AdminAnak;
use App\Livewire\AdminGigiMulut;
use App\Livewire\AdminJantung;
use App\Livewire\AdminMata;
use App\Livewire\AdminObgyn;
use App\Livewire\AdminPenyakitDalam;
use App\Livewire\AdminSaraf;
Use App\Livewire\AdminTht;
use App\Livewire\PendaftaranPasien;
use App\Livewire\Customer\ListUmum;
use App\Livewire\Customer\ListAnak;
use App\Livewire\Customer\ListGigiMulut;
use App\Livewire\Customer\ListJantung;
use App\Livewire\Customer\ListMata;
use App\Livewire\Customer\ListObgyn;
use App\Livewire\Customer\ListPenyakitDalam;
use App\Livewire\Customer\ListSaraf;
use App\Livewire\Customer\ListTht;


//Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
//Route::post('/', [App\Http\Controllers\DashboardController::class, 'contact'])->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
            Route::get('', 'index')->name('index')->middleware('role_or_permission:admin|users');
            Route::post('create', 'create')->name('create')->middleware('role_or_permission:admin|users');
            Route::put('status', 'status')->name('status')->middleware('role_or_permission:admin|users');
            Route::put('', 'update')->name('update')->middleware('role_or_permission:admin|users');
            Route::delete('delete', 'delete')->name('delete')->middleware('role_or_permission:admin|users');
    });
    Route::controller(RoleController::class)->prefix('roles')->name('roles.')->group(function () {
            Route::get('', 'index')->name('index')->middleware('role_or_permission:admin|roles');
            Route::post('create', 'create')->name('create')->middleware('role_or_permission:admin|roles');
            Route::put('status', 'status')->name('status')->middleware('role_or_permission:admin|roles');
            Route::put('', 'update')->name('update')->middleware('role_or_permission:admin|roles');
            Route::post('', 'permission')->name('permission')->middleware('role_or_permission:admin|roles');
            Route::delete('delete', 'delete')->name('delete')->middleware('role_or_permission:admin|roles');
    });
    Route::middleware('role_or_permission:admin|pendaftaran')->prefix('pendaftaran')->name('pendaftaran.')->group(function () {
            Route::get('', PendaftaranQueue::class)->name('index');    
    });
    Route::middleware('role_or_permission:admin|umum')->prefix('umum')->name('umum.')->group(function () {
            Route::get('', AdminUmum::class)->name('index');    
    });
    Route::middleware('role_or_permission:admin|anak')->prefix('anak')->name('anak.')->group(function () {
            Route::get('', AdminAnak::class)->name('index');    
    });
    Route::middleware('role_or_permission:admin|gigi_mulut')->prefix('gigi-mulut')->name('gigi_mulut.')->group(function () {
            Route::get('', AdminGigiMulut::class)->name('index');    
    });
    Route::middleware('role_or_permission:admin|obgyn')->prefix('obgyn')->name('obgyn.')->group(function () {
            Route::get('', AdminObgyn::class)->name('index');    
    });
    Route::middleware('role_or_permission:admin|penyakit_dalam')->prefix('penyakit-dalam')->name('penyakit_dalam.')->group(function () {
            Route::get('', AdminPenyakitDalam::class)->name('index');    
    });
    Route::middleware('role_or_permission:admin|saraf')->prefix('saraf')->name('saraf.')->group(function () {
            Route::get('', AdminSaraf::class)->name('index');    
    });
    Route::middleware('role_or_permission:admin|tht')->prefix('tht')->name('tht.')->group(function () {
            Route::get('', AdminTht::class)->name('index');    
    });
    Route::middleware('role_or_permission:admin|jantung')->prefix('jantung')->name('jantung.')->group(function () {
            Route::get('', AdminJantung::class)->name('index');    
    });
    Route::middleware('role_or_permission:admin|mata')->prefix('mata')->name('mata.')->group(function () {
            Route::get('', AdminMata::class)->name('index');    
    });
    Route::middleware('role_or_permission:customer')->prefix('booking')->name('booking')->group(function () {
            Route::get('', PendaftaranPasien::class);    
    });
    Route::middleware('role_or_permission:customer')->prefix('list')->name('customer.')->group(function () {
            Route::get('umum', ListUmum::class)->name('umum');    
            Route::get('anak', ListAnak::class)->name('anak');    
            Route::get('gigi-mulut', ListGigiMulut::class)->name('gigi_mulut');    
            Route::get('jantung', ListJantung::class)->name('jantung');    
            Route::get('mata', ListMata::class)->name('mata');    
            Route::get('obgyn', ListObgyn::class)->name('obgyn');    
            Route::get('penyakit-dalam', ListPenyakitDalam::class)->name('penyakit_dalam');    
            Route::get('saraf', ListSaraf::class)->name('saraf');    
            Route::get('tht', ListTht::class)->name('tht');    
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', MonitorQueue::class);
Route::middleware(['guest'])->group(function () {
    Route::get('/antrian', PendaftaranForm::class)->name('antrian');
});