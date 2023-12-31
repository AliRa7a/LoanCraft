<?php

use App\Http\Controllers\Backend\Admin\LoanController;
use App\Http\Controllers\Backend\Admin\LoanTypesController;
use App\Http\Controllers\Backend\Admin\UsersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider and assigned to the "web"
| middleware group. Make something great!
|
*/

// Default route to redirect to the login page
Route::get('/', function () {
    return view('auth.login');
});

// Dashboard route for authenticated and verified users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes for users with the "admin" role
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin dashboard and profile routes
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/update/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/admin/update/password', [AdminController::class, 'updatePassword'])->name('admin.password.update');
    Route::post('/admin/store/password', [AdminController::class, 'storePassword'])->name('admin.password.store');

    // Admin user routes
    Route::get('/admin/all/users', [UsersController::class, 'allUsers'])->name('admin.all.users');
    Route::delete('/admin/delete/{user}', [UsersController::class, 'deleteUser'])->name('delete.users');
    Route::get('/admin/user/detail/{id}', [UsersController::class, 'userDetail'])->name('user.deatail');
    Route::post('/admin/user/{id}/update-role', [UsersController::class, 'updateRole'])->name('user.update-role');
    Route::post('/admin/user/{id}/update-status', [UsersController::class, 'updateStatus'])->name('user.update-status');

    // Admin loan type routes
    Route::get('/admin/all/loan/types', [LoanTypesController::class, 'allLoanTypes'])->name('admin.all.loan.types');
    Route::post('/admin/add/loan_type', [LoanTypesController::class, 'addLoanType'])->name('add.loan.type');
    Route::delete('/admin/delete/loan_type/{loan_type}', [LoanTypesController::class, 'deleteLoanType'])->name('delete.loan.type');
    Route::get('/admin/loan-types/{id}/edit', [LoanTypesController::class, 'editLoanType'])->name('edit.loan.type');
    Route::put('/admin/loan-types/{id}', [LoanTypesController::class, 'updateLoanType'])->name('update.loan.type');

    // Admin loan application routes
    Route::get('/admin/all/loan/applications', [LoanController::class, 'allLoanApplications'])->name('admin.all.loan.applications');
    Route::get('/admin/loan/detail/{id}', [LoanController::class, 'loanDetail'])->name('loan.deatail');
    Route::post('/admin/loan/{id}/update-status', [LoanController::class, 'updateStatus'])->name('loan.update-status');
    Route::get('/admin/approved/loan/applications', [LoanController::class, 'ApprovedLoanApplications'])->name('admin.approved.loan.applications');
});

// User routes for users with the "user" role
Route::middleware(['auth', 'role:user'])->group(function () {
    // User dashboard and profile routes
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/update/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/user/update/password', [UserController::class, 'updatePassword'])->name('user.password.update');
    Route::post('/user/store/password', [UserController::class, 'storePassword'])->name('user.password.store');

    // User loan routes
    Route::get('/user/loan/application', [LoanController::class, 'loanApplication'])->name('user.loan.application');
    Route::post('/user/loan/store', [LoanController::class, 'loanStore'])->name('user.loan.store');
    Route::get('/user/approved/loan', [LoanController::class, 'approvedLoan'])->name('user.approved.loan');
});

// Authentication routes
require __DIR__ . '/auth.php';
