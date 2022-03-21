<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PessoasController;

/*Route::get('/', function () {
    return view('agenda.index');
});*/
// Rotas para as pessoas


    // Lista as pessoas
    Route::get('/', [PessoasController::class, 'index']);

    // View para cadastrar uma nova pessoa
    Route::get('/pessoas/create', [PessoasController::class, 'create']);

    // Post para cadastrar a nova pessoa
    Route::post('/pessoas', [PessoasController::class, 'store'])->name('slavar_pessoa');

    // Post para Deletar a nova pessoa
    //Route::get('pessoas.destroy', [PessoasController::class, 'destroy'])->name('pessoas.destroy');



