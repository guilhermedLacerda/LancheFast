<?php

use App\Livewire\Admin\AdminCreate;
use App\Livewire\Admin\AdminEdit;
use App\Livewire\Admin\AdminIndex;
use App\Livewire\Admin\AdminShow;
use App\Livewire\Clientes\Create;
use App\Livewire\Produto\ProdutoCreate;
use App\Livewire\Produto\ProdutoEdit;
use App\Livewire\Produto\ProdutoShow;
use App\Livewire\Produto\ProdutoIndex;
use Illuminate\Support\Facades\Route;

use App\Livewire\Funcionario\FuncionarioCreate;
use App\Livewire\Funcionario\FuncionarioEdit;
use App\Livewire\Funcionario\FuncionarioShow;
use App\Livewire\Funcionario\FuncionarioIndex;

use App\Livewire\Pedido\PedidosEdit;
use App\Livewire\Pedido\PedidosShow;
use App\livewire\Pedido\PedidosIndex;
use App\Livewire\Pedidos\PedidosCreate;
use App\Livewire\Pedidos\PedidosEdit as PedidosPedidosEdit;
use App\Livewire\Pedidos\PedidosIndex as PedidosPedidosIndex;
use App\Livewire\Pedidos\PedidosShow as PedidosPedidosShow;

Route::prefix('clientes')->group(function () {
    Route::get('/', \App\Livewire\Clientes\Index::class)->name('clientes.index');
    Route::get('/create', \App\Livewire\Clientes\Create::class)->name('clientes.create');
    Route::get('/{cliente}', \App\Livewire\Clientes\Show::class)->name('clientes.show');
    Route::get('/{cliente}/edit', \App\Livewire\Clientes\Edit::class)->name('clientes.edit');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', ProdutoIndex::class)->name('produtos.index');
    Route::get('/create', ProdutoCreate::class)->name('produtos.create');
    Route::get('/{produto}', ProdutoShow::class)->name('produtos.show');
    Route::get('/{produto}/edit', ProdutoEdit::class)->name('produtos.edit');
});

Route::prefix('funcionarios')->group(function () {
    Route::get('/', FuncionarioIndex::class)->name('funcionarios.index');
    Route::get('/create', FuncionarioCreate::class)->name('funcionarios.create');
    Route::get('/{funcionario}', FuncionarioShow::class)->name('funcionarios.show');
    Route::get('/{funcionario}/edit', FuncionarioEdit::class)->name('funcionarios.edit');
});

Route::prefix('pedidos')->group(function () {
    Route::get('/', PedidosPedidosIndex::class)->name('pedidos.index');
    Route::get('/create', PedidosCreate::class)->name('pedidos.create');
    Route::get('/{pedido}', PedidosPedidosShow::class)->name('pedidos.show');
    Route::get('/{pedido}/edit', PedidosPedidosEdit::class)->name('pedidos.edit');
});

Route::prefix('admin')->group(function () {
    Route::get('/', AdminIndex::class)->name('admin.index');
    Route::get('/create', AdminCreate::class)->name('admin.create');
    Route::get('/{admin}', AdminShow::class)->name('admin,show');
    Route::get('/{admin}/edit', AdminEdit::class)->name('admin.edit');
});



