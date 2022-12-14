<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', function () {
    return inertia('Home');
});

Route::get('/test', function () {
    return inertia('Test');
});

//Route::resource('customer', CustomerController::class)->except('show');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
