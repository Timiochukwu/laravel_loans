<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\Admin\UsersController;
use App\Http\Controllers\Backend\Admin\LoanTypesController;
use App\Http\Controllers\Backend\Admin\LoanController;
use App\Http\Controllers\AuthController;

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
    return view('auth/login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/update/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    
    Route::get('/admin/update/password', [AdminController::class, 'updatePassword'])->name('admin.password.update');
    Route::post('/admin/store/password', [AdminController::class, 'storePassword'])->name('admin.password.store');

    Route::get('/admin/all/user', [UsersController::class, 'allUsers'])->name('admin.all.users');
    Route::get('/admin/delete/{user}', [UsersController::class, 'deleteUser'])->name('admin.delete.users');
    Route::get('/admin/user/details/{id}', [UsersController::class, 'userDetails'])->name('user.details');

    Route::post('/admin/user/{id}/toggle-role', [UsersController::class, 'toggleRole'])->name('toggle.user.role');
    Route::post('/admin/user/{id}/toggle-status', [UsersController::class, 'toggleStatus'])->name('toggle.user.status');

    Route::get('/admin/all/loan', [LoanTypesController::class, 'loanType'])->name('admin.all.loan.types');
    Route::post('/admin/add/loan_type', [LoanTypesController::class, 'addLoanType'])->name('admin.add.loan.type');
    Route::get('/admin/delete/loan_type/{loan_type}', [LoanTypesController::class, 'deleteLoanType'])->name('delete.loan_type');

    Route::get('/admin/edit/loan_type/{id}', [LoanTypesController::class, 'editLoanType'])->name('admin.edit.loan.type');
    Route::put('/admin/edit/loan_type/{id}', [LoanTypesController::class, 'updateLoanType'])->name('admin.update.loan.type');
    


    Route::get('/admin/all/loan/application', [LoanController::class, 'allLoanApplication'])->name('admin.all.loan.application');
    Route::get('/admin/approved/loan/application', [LoanController::class, 'approvedLoanApplication'])->name('admin.approved.loan.application');
    Route::get('/admin/loan/{id}/details', [LoanController::class, 'LoanDetails'])->name('user.loan.details');
    Route::post('/admin/loan/{id}/toggle-status', [LoanController::class, 'toggleLoanStatus'])->name('toggle.loan.status');

});



Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/update/profile', [UserController::class,'updateProfile'])->name('user.profile.update');

    Route::get('/user/update/password', [UserController::class, 'updatePassword'])->name('user.password.update');
    Route::post('/user/store/password', [UserController::class, 'storePassword'])->name('user.password.store');
    Route::get('/user/loan/application', [LoanController::class, 'loanApplication'])->name('user.apply.loan');
    Route::post('/user/store/loan/application', [LoanController::class, 'storeLoanApplication'])->name('user.store.loan');
    


});

require __DIR__.'/auth.php';
