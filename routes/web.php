<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
})->name('index');

Route::get('/dashboard', function () {

    return view('templates.main')->with('titulo', "");

})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('funcionarios', 'FuncionarioController');
    Route::resource('areas', 'AreaController');
    Route::resource('exames', 'ExameController');
    Route::resource('vacinas', 'VacinaController');
    Route::resource('vacinasFuncionario', 'VacinaFuncionarioController');
    Route::resource('contaminacoes', 'ContaminacaoController');

    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
});
/*
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
    return $vacinafunobj_vacinafuncionariocionario->toJson();
});*/

require __DIR__.'/auth.php';