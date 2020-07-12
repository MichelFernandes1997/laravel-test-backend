<?php

use Illuminate\Support\Facades\Route;
use Imovel\ImovelController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/verify-email/contrato', 'Email\VerifiedEmail@verifyEmailContratante')->middleware('hasVerified');

Route::get('/verify-email/imovel', 'Email\VerifiedEmail@verifyEmailProprietario')->middleware('hasVerified');

Route::get('/hasVerified', 'Email\VerifiedEmail@verifiedShow')->name('hasVerified.show');

Route::get('/imovel/list/{order}', 'Imovel\ImovelController@orderBy');

Route::get('/imovel/select', 'Imovel\ImovelController@selectList');

Route::resource('imovel', ImovelController::class);

Route::get('/contrato', "Contrato\ContratoController@index");

Route::post('/contrato', "Contrato\ContratoController@store");