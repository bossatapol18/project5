<?php

use App\Http\Controllers\ProducttypeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users=DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
Route::get('user',[UserController::class,'index'])->name('user');
Route::get('/user/show/{id}',[UserController::class,'show']);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
Route::get('department',[DepartmentController::class,'index'])->name('department');
Route::post('/department/add',[DepartmentController::class,'store'])->name('adddepartment');
Route::get('/department/edit/{id}',[DepartmentController::class,'edit']);
Route::post('/department/update/{id}',[DepartmentController::class,'update']);
});
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
Route::get('/sup',[SupController::class,'index'])->name('sup');
Route::post('/sup/add',[SupController::class,'store'])->name('addsup');
Route::get('/sup/edit/{id}',[SupController::class,'edit']);
Route::post('/sup/update/{id}',[SupController::class,'update']);
});

// product
// type
Route::get('/producttype',[ProducttypeController::class,'index'])->name('producttype');