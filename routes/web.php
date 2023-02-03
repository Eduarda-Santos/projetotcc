<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Mid;

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

Route::get('/dashboard', function () {
    return view('templates.main')->with('titulo', "");
})->middleware(['auth'])->name('dashboard');

//fazer caminho para login e register

/*
Route::get('/register', function () {
    return view('auth.register')->with('titulo', "");
})->middleware(['auth'])->name('dashboard');*/

//Route::resource('/funcionarios', '\App\Http\Controllers\FuncionarioController')->middleware(['auth']);

//Route::get('/relatorios')->name('relatorios');

Route::get('/relatorios', function () {
    return view('relatorios')->with('titulo', "");
});
/*
Route::get('/register')->name('register');
Route::get('/login')->name('login');
Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('funcionarios', 'FuncionarioController');
    Route::resource('areas', 'AreaController');
    Route::resource('exames', 'ExameController');
    Route::resource('vacinas', 'VacinaController');
    Route::resource('vacinasFuncionario', 'VacinaFuncionarioController');
    Route::resource('contaminacoes', 'ContaminacaoController');
});*/

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

require __DIR__.'/auth.php';