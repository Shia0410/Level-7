<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::resource('items', ItemController::class);

Route::get('/', function () {
    return redirect()->route('items.index');
});
