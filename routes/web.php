<?php

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

Route::get('/', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');

Route::redirect('/funcionarios', 301);
Route::resource('funcionarios', 'FuncionarioController');

Route::redirect('/areas', 302);
Route::resource('areas', 'AreaController');

Route::redirect('/vacinas', 303);
Route::resource('vacinas', 'VacinaController');

Route::redirect('/exames', 304);
Route::resource('exames', 'ExameController');

Route::redirect('/vacinasFuncionario', 305);
Route::resource('vacinasFuncionario', 'VacinaFuncionarioController');

Route::redirect('/contaminacoes', 306);
Route::resource('contaminacoes', 'ContaminacaoController');

