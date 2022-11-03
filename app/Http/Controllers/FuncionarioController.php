<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuncionarioController extends Controller {
    
    public function index() {
        return "<h2>Lista de Clientes</h2>";
    }

    public function create() {
        
        return view('funcionarios.create');
    }

    public function store(Request $request) {

        $request->validate([
            'nome' => 'required|max:50|min:10',
            ]);

        Funcionario::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'sexo' => $request->sexo,
            'data' => $request->data,
            'telefoneEmergencia' => $request->telefoneEmergencia,
            'ativo' => $request->ativo,
        ]);
        
        return redirect()->route('funcionarios.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $data = Funcionario::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('funcionarios.edit', compact('data'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Funcionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'sexo' => $request->sexo,
            'data' => $request->data,
            'telefoneEmergencia' => $request->telefoneEmergencia,
            'ativo' => $request->ativo,
        ]);

        $obj->save();

        return redirect()->route('funcionarios.index');
    }

    public function destroy($id) {
        
        $obj = Funcionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('funcionarios.index');
    }
}