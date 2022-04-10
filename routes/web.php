<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//ROTA RELACIONADA A USUARIOS

Route::prefix('/users')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/create', [UserController::class, 'add'])->name('users.add');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/edit/{id}', [UserController::class, 'editAction'])->name('users.editAction');
    Route::get('/details/{id}', [UserController::class, 'details'])->name('users.details');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    //ROTAS DE COMENTARIOS DO USUARIO
    Route::get('/comments/{id}', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/comments/{id}/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/comments/{id}/create', [CommentController::class, 'addComment'])->name('comments.addComment');
    Route::get('/{user}/comments/{id}', [CommentController::class, 'editComment'])->name('comments.edit');
    Route::put('/comments/{id}', [CommentController::class, 'updateComment'])->name('comments.update');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
