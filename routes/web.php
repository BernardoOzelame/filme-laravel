<?php

use App\Http\Controllers\FilmesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicial');
})->name('index'); 

Route::get('/filmes', [FilmesController::class, 'index'])->name('filmes');

Route::get('/filmes/cadastrar', [FilmesController::class, 'cadastrar'])->name('filmes/cadastrar');

Route::post('/filmes/cadastrar', [FilmesController::class, 'gravar'])->name('filmes/gravar');

Route::get('/filmes/editar/{film}', [FilmesController::class, 'editar'])->name('filmes/editar');

Route::put('/filmes/editar/{film}', [FilmesController::class, 'editarGravar']);

Route::get('/filmes/apagar/{film}', [FilmesController::class, 'apagar'])->name('filmes/apagar'); 

Route::delete('filmes/apagar/{film}', [FilmesController::class, 'deletar']);

//----------------------------------------------------------------------------------------------------------------------

Route::prefix('usuarios')->middleware('auth')->group(function() {
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');

    Route::get('/cadastrar', [UsuariosController::class, 'cadastrar'])->name('usuarios/cadastrar');
    
    Route::post('/cadastrar', [UsuariosController::class, 'gravar'])->name('usuarios/gravar');
    
    Route::get('/editar/{user}', [UsuariosController::class, 'editar'])->name('usuarios/editar');
    
    Route::put('/editar/{user}', [UsuariosController::class, 'editarGravar']);
    
    Route::get('/apagar/{user}', [UsuariosController::class, 'apagar'])->name('usuarios/apagar'); 
    
    Route::delete('/apagar/{user}', [UsuariosController::class, 'deletar']);
});


//----------------------------------------------------------------------------------------------------------------------

Route::get('/login', [UsuariosController::class, 'login'])->name('login');

Route::post('/login', [UsuariosController::class, 'login']);

Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');   