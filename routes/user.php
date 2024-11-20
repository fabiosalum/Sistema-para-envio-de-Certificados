<?php


use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\CerificatesController;
use App\Http\Controllers\User\MensagemController;
use App\Http\Controllers\User\ProfileUserController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;



Route::group(['as' => 'user.'], function(){

    Route::middleware('auth', 'role:user')->get('user/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    /** Profile Routes */
    Route::get('user/profile', [ProfileUserController::class, 'index'])->name('profile');
    Route::put('user/profile', [ProfileUserController::class, 'updateProfile'])->name('profile.update');
    Route::put('user/profile/password', [ProfileUserController::class, 'updatePassword'])->name('profile.password.update');

    /** Certificates Routes */
    Route::get('user/certificados', [CerificatesController::class, 'index'])->name('certificates');
    Route::post('user/certificados/upload', [CerificatesController::class, 'store'])->name('certificates.upload');

     /** FeedBack Routes */
     Route::get('user/feedback', [MensagemController::class, 'index'])->name('feedback');

    
});
