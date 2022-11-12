<?php

namespace App\Http\Controllers;
use App\Models\VacinaFuncionario;
use App\Models\Vacina;

use Illuminate\Http\Request;

class VacinaFuncionarioController extends Controller {
    
    public function index() {
        $data = VacinaFuncionario::all();
        return view('vacinasFuncionario.index', compact('data'));
    }

    public function create() {
        
        return view('vacinasFuncionario.create');
    }

    public function store(Request $request) {

        $request->validate([
            'nome' => 'required|max:50|min:10',
            ]);

        VacinaFuncionario::create([
            'funcionario_id' => $request->funcionario_id,
            'dose' => $request->dose,
            'dataVacina' => $request->dataVacinaFuncionario,
            'lote' => $request->lote,
        ]);
        
        return redirect()->route('vacinasFuncionario.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $data = VacinaFuncionario::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('vacinasFuncionario.edit', compact('data'));    
    }

    public function update(Request $request, $id) {
     
        $obj = VacinaFuncionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'funcionario_id' => $request->funcionario_id,
            'dose' => $request->dose,
            'dataVacina' => $request->dataVacinaFuncionario,
            'lote' => $request->lote,
        ]);

        $obj->save();

        return redirect()->route('vacinasFuncionario.index');
    }

    public function destroy($id) {
        
        $obj = VacinaFuncionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('vacinasFuncionario.index');
    }
}