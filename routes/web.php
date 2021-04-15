<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvoicedController;
use App\Http\Controllers\InvoicehController;
use App\Http\Controllers\ProjectController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard\Index;
use App\Http\Livewire\Dashboard\InvoiceDetail;
use App\Http\Livewire\Dashboard\InvoiceHeader;
use App\Http\Livewire\Dashboard\Project;
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

Route::get('/', Login::class)->middleware('guest');
Route::get('/login', Login::class)->name('login')->middleware('guest');



Route::middleware(['auth'])->group(function () {

    Route::get('/home', Index::class)->name('dashboard.index');
    Route::get('/dashboard', Index::class)->name('dashboard.index');
    Route::get('/logout', [AuthController::class, 'logoutweb'])->name('logout');


    Route::middleware(['onlyAdminAndSuperAdmin'])->group(function () {
        //hanya admin dan super admin yang bisa akses
        Route::get('/dashboard/project', Project::class)->name('dashboard.project');
        Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/project/{id}', [ProjectController::class, 'delete'])->name('project.delete');
    });

    Route::middleware(['without-user'])->group(function () {
        //semua bisa akses kecuali role user
        Route::get('/dashboard/invoice-header', InvoiceHeader::class)->name('dashboard.invoice-header');
        Route::get('/dashboard/invoice-detail', InvoiceDetail::class)->name('dashboard.invoice-detail');
        Route::put('/invoiceh/{id}', [InvoicehController::class, 'update'])->name('invoiceh.update');
        Route::delete('/invoiceh/{id}', [InvoicehController::class, 'delete'])->name('invoiceh.delete');
        Route::put('/invoiced/{id}', [InvoicedController::class, 'update'])->name('invoiced.update');
        Route::delete('/invoiced/{id}', [InvoicedController::class, 'delete'])->name('invoiced.delete');
    });
});
