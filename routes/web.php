<?php

use App\Livewire\Clientes\Create;
use App\Livewire\Clientes\Edit;
use App\Livewire\Clientes\Index;
use App\Livewire\Clientes\Show;
use Illuminate\Support\Facades\Route;

Route::prefix('clientes')->group(function() {
    Route::get('/', \App\Livewire\Clientes\Index::class)->name('clientes.index');
    Route::get('/create', \App\Livewire\Clientes\Create::class)->name('clientes.create');
    Route::get('/{clientes}', \App\Livewire\Clientes\Show::class)->name('clientes.show');
    Route::get('/{clientes}/edit', \App\Livewire\Clientes\Edit::class)->name('clientes.edit');
});
