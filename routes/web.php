<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LogginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarrinhoController;

use Illuminate\Support\Facades\Route;


Route::match(['get', 'post'], '/', [ProdutoController::class, 'index'])->name('home');

// categoria
Route::match(['get', 'post'], '/categoria', [ProdutoController::class, 'categoria'])->name('categoria');
Route::match(['get', 'post'], '/categoria/{id_categoria}', [ProdutoController::class, 'busca_categoria'])->name('categoria_por_id');

// carrinho
Route::match(['get', 'post'], '/carrinho/adicionar/{id_produto}', [CarrinhoController::class, 'adicionarCarrinho'])->name('adicionar_carrinho');
Route::match(['get', 'post'], '/carrinho', [CarrinhoController::class, 'verCarrinho'])->name('ver_carrinho');
Route::match(['get', 'post'], '/excluir_carrinho/{indice}', [CarrinhoController::class, 'excluirCarrinho'])->name('excluir_carrinho');

// cadastrar
Route::match(['get', 'post'], '/cadastrar', [ClienteController::class, 'index'])->name('cadastrar');
Route::match(['get', 'post'], '/atualizar', [ClienteController::class, 'atualizar'])->name('atualizar');
Route::match(['get', 'post'], '/update', [ClienteController::class, 'update'])->name('update');
Route::match(['get', 'post'], '/cadastrar/email-verify', [ClienteController::class, 'to_check'])->name('verificar_email');
Route::match(['get', 'post'], '/cadastrar/endereco', [ClienteController::class, 'endereco'])->name('endereco');
Route::match(['get', 'post'], '/cliente/cadastrar', [ClienteController::class, 'salvar1'])->name('cadastrar_cliente');
Route::match(['get', 'post'], '/cliente/cadastrar/endereco', [ClienteController::class, 'salvar2'])->name('cadastrar_endereco');

//usuario
Route::match(['get', 'post'], '/login', [UsuarioController::class, 'index'])->name('login');

//login
Route::match(['get', 'post'], '/login/logar', [LogginController::class, 'auth'])->name('logar');
Route::match(['get', 'post'], '/logout', [LogginController::class, 'logout'])->name('logout');