<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MensagemController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::middleware('auth', 'role:admin')->get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    /** Profile Routes */
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    /** User Routes */
    Route::get('usuarios', [UsersController::class, 'index'])->name('usuarios');
    Route::get('usuario/editar/{id}', [UsersController::class, 'edit'])->name('usuarios.edit');
    Route::put('usuario/atualizar/{id}', [UsersController::class, 'update'])->name('usuarios.update');
    Route::get('usuario/show/{id}', [UsersController::class, 'show'])->name('usuarios.show');
    Route::post('/usuario/nota/{id}', [UsersController::class, 'salvarnota'])->name('salvar.nota');
    Route::post('/usuario/mensagem/{id}', [UsersController::class, 'salvarmensagem'])->name('salvar.mensagem');
    Route::get('/certificados/download/{id}', [UsersController::class, 'download'])->name('certificates.download');
    Route::delete('/certificados/excluir-{id}', [UsersController::class, 'destroy'])->name('certificates.destroy');

    /** Mesage Routes */
    Route::get('mensagem', [MensagemController::class, 'index'])->name('mensagem');
    Route::post('mensagem/show', [MensagemController::class, 'viewmessage'])->name('mensagem.view');
    
   
    
});
