<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/project_list', [App\Http\Controllers\ProjectController::class, 'list'])->name('project.list');
Route::get('/getEmployees/{id}', [App\Http\Controllers\PaymentController::class, 'getEmployees'])->name('getEmployees');
Route::get('/getLeave/', [App\Http\Controllers\CalendarController::class, 'getLeave'])->name('getLeave');
Route::post('/payment/{id}', [App\Http\Controllers\PaymentController::class, 'print'])->name('payment.print');

// Route::get('/department/search', [App\Http\Controllers\DepartementController::class, 'search'])->name('department.search');
// Route::get('/employee/search', [App\Http\Controllers\UserController::class, 'search'])->name('employee.search');
Route::post('/attendance/search', [App\Http\Controllers\AttendanceController::class, 'search'])->name('attendance.search');
Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar');





Route::resource('employee', UserController::class);
Route::resource('attendance', AttendanceController::class);
Route::resource('departement', DepartementController::class);
Route::resource('dashboard', DashboardController::class);
Route::resource('payroll', PayrollController::class);
Route::resource('project', ProjectController::class);
Route::resource('asset', AssetController::class);
Route::resource('leave', LeaveController::class);
Route::resource('payment', PaymentController::class);
Route::resource('salary', SalaryController::class);



