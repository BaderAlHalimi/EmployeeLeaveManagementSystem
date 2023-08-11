<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLeaveController;
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
    return view('welcome');
})->name('main');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('admin/manage', [UserController::class, 'manage'])->name('admin.manage');

Route::get('dashboard', function(){
    return redirect()->route('dashboard');
})->middleware(['auth', 'verified']);

Route::get('admin/leaves/requests',[UserLeaveController::class,'index'])->name('allLeaves');
Route::get('admin/leaves/{id}/accept',[UserLeaveController::class,'accept'])->name('accept');
Route::get('admin/leaves/{id}/cancele',[UserLeaveController::class,'cancele'])->name('cancele');
Route::get('admin/leaves/accepted',[UserLeaveController::class,'accepted'])->name('accepted');
Route::get('admin/leaves/pending',[UserLeaveController::class,'pending'])->name('pending');
Route::get('admin/leaves/canceled',[UserLeaveController::class,'canceled'])->name('canceled');
Route::resource('admin/leaves',LeaveController::class)->middleware('auth');
Route::resource('admin', UserController::class);
Route::get('admin',[UserController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('employee',[EmployeeController::class,'index'])->name('employee.index'); 
Route::get('employee/leave/request',[EmployeeController::class,'create'])->name('employee.leave.create'); 
Route::post('employee/leave/request',[EmployeeController::class,'store'])->name('employee.leave.store'); 
Route::get('employee/leave/view',[EmployeeController::class,'view'])->name('employee.leave.view'); 