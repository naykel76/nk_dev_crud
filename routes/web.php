<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{PageCrudTable};
use App\Http\Livewire\{PageTable, PageCreateEdit, PageBuilder};

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/dev', function () {
    return view('dev');
})->name('dev');

Route::get('pages-with-table-and-crud-modal', PageCrudTable::class)->name('pages.crud-table');

Route::middleware(['web'])->group(function () {

    Route::prefix('admin')->name('admin')->group(function () {
        Route::get('pages/builder/{page:slug}/edit', PageBuilder::class)->name('.pages.builder.edit');
        Route::get('pages/builder/create', PageBuilder::class)->name('.pages.builder.create');

        Route::get('pages/{page:slug}/edit', PageCreateEdit::class)->name('.pages.edit');
        Route::get('pages/create', PageCreateEdit::class)->name('.pages.create');
        Route::get('pages', PageTable::class)->name('.pages.index');
    });
});

// /** ---------------------------------------------------------------------------
//  *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
//  * ------------------------------------------------------------------------- */
// ///////////////////////////////////////////////////////////////////////////////
// Route::get('/{page}', [PageController::class, 'show'])->name('pages.show');
// ///////////////////////////////////////////////////////////////////////////////
// /** ---------------------------------------------------------------------------
//  *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
//  * ------------------------------------------------------------------------- */
