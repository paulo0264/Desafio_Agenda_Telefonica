<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PessoasController;

    // Rota Pagina Index
    Route::get('/', [PessoasController::class, 'index'])->name('pessoas.index');

    // Listar as pessoas na View
    Route::get('/{id}ver_pessoa', [PessoasController::class, 'show'])->name('ver_pessoa');

    // Retorna View para cadastrar uma nova pessoa
    Route::get('/pessoas/create', [PessoasController::class, 'create']);

    // Post para Salvar a nova pessoa no BD
    Route::post('/slavar_pessoa', [PessoasController::class, 'store'])->name('slavar_pessoa');

    // Post para DEditar a nova pessoa
    Route::get('/{id}/pessoas/editar', [PessoasController::class, 'edit']);
    // Post para Editar a nova pessoa
    Route::post('/{id}/pessoas/editar', [PessoasController::class, 'update'])->name('atualiza_contato');

    // Post para Deletar a nova pessoa
    Route::post('/{id}pessoas.destroy', [PessoasController::class, 'destroy'])->name('pessoas.destroy');



