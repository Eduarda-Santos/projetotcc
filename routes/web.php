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

Route::get('/auth', function () {
    return view('auth.register');
});

/*
Route::get('/register', function () {
    return view('auth.register')->with('titulo', "");
})->middleware(['auth'])->name('dashboard');*/

//Route::resource('/funcionarios', '\App\Http\Controllers\FuncionarioController')->middleware(['auth']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('funcionarios', 'FuncionarioController');
    Route::resource('areas', 'AreaController');
    Route::resource('exames', 'ExameController');
    Route::resource('vacinas', 'VacinaController');
    Route::resource('vacinasFuncionario', 'VacinaFuncionarioController');
    Route::resource('contaminacoes', 'ContaminacaoController');

    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
});

Route::middleware(['auth'])->group(function(){
    Route::resource('vacinas','VacinaController');
});

require __DIR__.'/auth.php';