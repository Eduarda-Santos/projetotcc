<?php

use Illuminate\Support\Facades\Route;
use App\Models\Vacina;
use App\Models\VacinaFuncionario;
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
Route::get('/', function() {
    return view('welcome');
})->middleware('Mid');

Route::get('/', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');

Route::redirect('/funcionarios', 301);
Route::resource('funcionarios', 'FuncionarioController');

Route::redirect('/areas', 302);
Route::resource('areas', 'AreaController');

Route::redirect('/exames', 304);
Route::resource('exames', 'ExameController');

Route::redirect('/vacinas', 303);
Route::resource('vacinas', 'VacinaController');

Route::redirect('/vacinasFuncionario', 305);
Route::resource('vacinasFuncionario', 'VacinaFuncionarioController');

Route::redirect('/contaminacoes', 306);
Route::resource('contaminacoes', 'ContaminacaoController');

Route::post('vacinas/add', function(Request $request) {
    
    $obj_vacinafuncionario = new VacinaFuncionario();
    $obj_vacinafuncionario->nome = mb_strtoupper($request->nome_vacinafuncionario, 'UTF-8');
    $obj_vacinafuncionario->observacao = mb_strtoupper($request->obs_vacinafuncionario, 'UTF-8');
    $obj_vacinafuncionario->save();

    $table->unsignedBigInteger('vacina_id');
    $table->foreign('vacina_id')->references('id')->on('vacinas');
    $table->integer('dose');
    $table->unsignedBigInteger('funcionario_id');
    $table>foreign('funcionario_id')->references('id')->on('funcionarios');
    $table->date('dataVacina');
    $table->string('lote');
    
    $obj_vacina = new Vacina();
    $obj_vacina->nome = mb_strtoupper($request->nome_vacina, 'UTF-8');
    $obj_vacina->observacao = mb_strtoupper($request->obs_vacina, 'UTF-8');
    
    $obj_vacinafuncionario->vacina()->associate($obj_vacina);
    $obj_vacinafuncionario->save();
    return "<h1>Vacina Cadastrada com Sucesso!</h1>";
});

Route::get('/vacinas', function () {
    $obj_vacina = Vacina::with(['vacinafuncionario'])->get();
    return $obj_vacina->toJson();
});

Route::get('/vacinafuncionario', function () {
    $obj_vacinafuncionario = VacinaFuncionario::with(['vacinas'])->get();
    return $obj_vacinafuncionario->toJson();
});

Route::get('/vacinas', 'VacinaController@index')
->middleware('Mid', 'NewMid');

Route::get('/vacinas/{id}', 'VacinaController@show')
->middleware('Mid');


    