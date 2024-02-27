<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MdaController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RetirementController;
use App\Http\Controllers\ConfermentController;

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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('locations', LocationController::class);
    Route::get('home', [HomeController::class, 'index'])->name('home');
});

//CHANGE PASSWORD
Route::get('update-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('update-password');
Route::post('update-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

//Employees
// Route::view('employees', 'employees/index');
// Route::view('employees.create', 'employees.create');
Route::view('export', 'employees/export');

//Transfer
Route::view('transfer', 'transfer-applications/index');
Route::view('transfer-applications/create','transfer-applications/create');
//Applications
Route::view('application', 'employment-applications/index');
Route::view('employment-applications.create','employment-applications.create');
//
Route::view('charts', 'graphs/chart');
//




// ROUTES ADDED BY TK
Route::resource('mda', MDAController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('uploads', UploadController::class);
Route::resource('transfers', TransferController::class);
Route::resource('disciplines', DisciplineController::class);
Route::resource('promotions', PromotionController::class);
Route::get('employees-upload', [EmployeeController::class, 'showUpload'])
    ->name('employees-upload.show');
Route::post('employees-upload', [EmployeeController::class, 'uploadEmployees'])
    ->name('employees.upload');
Route::get('employees-export', [EmployeeController::class, 'showEmployeeExport'])
    ->name('employees-export.show');
Route::get('employees-export', [EmployeeController::class, 'showEmployeeExport'])
    ->name('employees-export.show');
Route::get('employees-retirement/{mdaId?}', [RetirementController::class, 'index'])
    ->name('retirement.show');
Route::get('employees-retirement-view/{mda?}/{category?}', [RetirementController::class, 'viewCategory'])
    ->name('retirement.category.show');
Route::get('employees-conferment/{mdaId?}', [ConfermentController::class, 'index'])
    ->name('conferment.show');
Route::get('employees-conferment-view/{mda?}/{category?}', [ConfermentController::class, 'viewCategory'])
    ->name('conferment.category.show');
Route::get('transfer-management/', [TransferController::class, 'showPendingTransfer'])
    ->name('transfers.show');
Route::get('transfer-management-view/{transferID?}', [TransferController::class, 'showManageTransfer'])
    ->name('transfers.manage');
Route::patch('transfer-management-view/{employeeID?}/{transferID?}/{toMda?}', [TransferController::class, 'updateTransferStatus'])
    ->name('transfers.manage.edit');