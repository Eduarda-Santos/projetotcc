<?php

namespace App\Http\Controllers;
use App\Models\Contaminacao;

use Illuminate\Http\Request;

class ContaminacaoController extends Controller {
    
    public function index() {
        $this->authorize('viewAny', Contaminacao::class);
/*
        $roles = Role::orderBy('name')->get();
        return view('auth.register', compact('roles'));*/

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

        Contaminacao::create([
            'funcionario_id' => 1,
            'dataInicioSintomas' => $request->dataInicioSintomas,
            'dataInicioAfastamento' => $request->dataInicioAfastamento,
            'dataRealizacaoExame' => $request->dataRealizacaoExame,
            'resultadoExame' => $request->resultadoExame,
            'dataTerminoAfastamento' => $request->dataTerminoAfastamento,
            'descricao' => $request->descricao,
            'anexo' => 1,
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
            'funcionario_id' => $request->funcionario_id,
            'dataInicioSintomas' => $request->dataInicioSintomas,
            'dataInicioAfastamento' => $request->dataInicioAfastamento,
            'dataRealizacaoExame' => $request->dataRealizacaoExame,
            'resultadoExame' => $request->resultadoExame,
            'dataTerminoAfastamento' => $request->dataTerminoAfastamento,
            'descricao' => $request->descricao,
            'anexo' => 1,
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