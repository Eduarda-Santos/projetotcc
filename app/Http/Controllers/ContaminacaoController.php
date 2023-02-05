<?php

namespace App\Http\Controllers;
use App\Models\Contaminacao;

use Illuminate\Http\Request;

class ContaminacaoController extends Controller {
    
    public function index() {
        $this->authorize('viewAny', Contaminacao::class);
        $data = Contaminacao::paginate(5);
        $data = Contaminacao::all();
        return view('contaminacoes.index', compact('data'));
    }

    public function create() {
        $this->authorize('create', Contaminacao::class);
        return view('contaminacoes.create');
    }

    public function store(Request $request) {

        $this->authorize('create', Contaminacao::class);
        $request->validate([
            'nome' => 'required|max:50|min:10',
            ]);

        Contaminacao::create([
            'dataInicioSintomas' => $request->dataInicioSintomas,
            'dataInicioAfastamento' => $request->dataInicioAfastamento,
            'dataRealizacaoExame' => $request->dataRealizacaoExame,
            'resultadoExame' => $request->resultadoExame,
            'dataTerminoAfastamento' => $request->dataTerminoAfastamento,
            'descricao' => $request->descricao,
        ]);
        
        return redirect()->route('contaminacoes.index');
    }

    public function show($id) { }

    public function edit(Request $request, $id, Contaminacao $contaminacao) {
        
        $this->authorize('update', $contamincao);
        $data = Contaminacao::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('contaminacoes.edit', compact('data'));    
    }

    public function update(Request $request, $id, Contaminacao $contaminacao) {
     
        $this->authorize('update', $data);
        $obj = Contaminacao::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'dataInicioSintomas' => $request->dataInicioSintomas,
            'dataInicioAfastamento' => $request->dataInicioAfastamento,
            'dataRealizacaoExame' => $request->dataRealizacaoExame,
            'resultadoExame' => $request->resultadoExame,
            'dataTerminoAfastamento' => $request->dataTerminoAfastamento,
            'descricao' => $request->descricao,
        ]);

        $obj->save();

        return redirect()->route('contaminacoes.index');
    }

    public function destroy(Request $request, $id, Contaminacao $contaminacao) {
        
        $this->authorize('delete', $contamincao);
        $obj = Contaminacao::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('contaminacoes.index');
    }
}