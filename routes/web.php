<?php

use Illuminate\Support\Facades\Route;
use Naykel\Gotime\Facades\RouteBuilder;
use App\Http\Livewire\{PageCrudTable};

Route::get('/', function () {
    return view('pages.home');
})->name('home');

RouteBuilder::create('nav-main');

// all in one data table, with crud modal
Route::get('pages-with-table-and-crud', PageCrudTable::class)->name('pages.crud-table');
