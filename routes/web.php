<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\Contract;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $allContracts = Contract::select("id", "invested_amount","currency","created_at")->get();
    return view('home', compact('allContracts'));
})->name('home');

Route::view('/contract', 'contract')->name('contract-chart');

Route::resource('contract', \App\Http\Controllers\ContractController::class)->only('show');
