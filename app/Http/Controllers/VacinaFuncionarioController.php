<?php

namespace App\Http\Controllers;
use App\Models\VacinaFuncionario;
use App\Models\Vacina;
use App\Models\Funcionario;

use Illuminate\Http\Request;

class VacinaFuncionarioController extends Controller {
    
    public function index() {
        $this->authorize('viewAny', VacinaFuncionario::class);
        $data = VacinaFuncionario::paginate(5);
        $data = VacinaFuncionario::all();
        return view('vacinasFuncionario.index', compact('data'));
    }

    public function create() {
        $this->authorize('create', VacinaFuncionario::class);
        return view('vacinasFuncionario.create');
    }

    public function store(Request $request, $id, VacinaFuncionario $vacinafuncionario) {

        $this->authorize('create', VacinaFuncionario::class);
        VacinaFuncionario::create([
            'vacina_id' => 1,
            'funcionario_id' => 1,
            'dose' => $request->dose,
            'dataVacina' => $request->dataVacina,
            'lote' => $request->lote,
        ]);
        
        return redirect()->route('vacinasFuncionario.index');
    }

    public function show($id) { }

    public function edit(Request $request, $id, VacinaFuncionario $vacinafuncionario) {
        $this->authorize('update', $data);
        $data = VacinaFuncionario::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('vacinasFuncionario.edit', compact('data'));    
    }

    public function update(Request $request, $id, VacinaFuncionario $vacinafuncionario) {
        $this->authorize('update', $vacinafuncionario);
        $obj = VacinaFuncionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'vacina_id' => 1,
            'funcionario_id' => 1,
            'dose' => $request->dose,
            'dataVacina' => $request->dataVacina,
            'lote' => $request->lote,
        ]);

        $obj->save();

        return redirect()->route('vacinasFuncionario.index');
    }

    public function destroy(Request $request, $id, VacinaFuncionario $vacinafuncionario) {

        $this->authorize('delete', $vacinafuncionario);
        $obj = VacinaFuncionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('vacinasFuncionario.index');
    }
}