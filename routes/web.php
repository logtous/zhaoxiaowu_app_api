<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/zxw/user', [MemberController::class, 'login']);
Route::post('/zxw/user/register', [MemberController::class, 'register']);

Route::get('/zxw/AccountingType', [\App\Http\Controllers\AccountingController::class, 'type']);

Route::get('/zxw/AccountingHistory', [\App\Http\Controllers\AccountingController::class, 'index']);
Route::put('/zxw/AccountingHistory', [\App\Http\Controllers\AccountingController::class, 'update']);
Route::delete('/zxw/AccountingHistory', [\App\Http\Controllers\AccountingController::class, 'destroy']);

