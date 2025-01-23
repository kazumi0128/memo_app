<?php

use App\Http\Controllers\MemoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MemoController::class,'inedex']);

Route::resource('memos', MemoController::class);
