<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/organization', App\Http\Controllers\OrganizationController::class);

// Route::get('/organization', [OrganizationController::class, 'index'])->name('organization.index');
// Route::post('/organization', [OrganizationController::class, 'store'])->name('organization.store');
// Route::get('/organization/{organization}/edit', [OrganizationController::class, 'edit'])->name('organization.edit');
// Route::delete('/organization/{organization}', [OrganizationController::class, 'destroy'])->name('organization.destroy');
// Route::put('/organization/{organization}', [OrganizationController::class, 'update'])->name('organization.update');
// Route::get('/organization/create', [OrganizationController::class, 'create'])->name('organization.create');
// Route::get('/organization/{organization}', [OrganizationController::class, 'show'])->name('organization.show');
