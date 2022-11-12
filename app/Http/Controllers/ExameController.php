<?php

namespace App\Http\Controllers;
use App\Models\Exame;

use Illuminate\Http\Request;

class ExameController extends Controller {
    
    public function index() {
        $data = Exame::all();
        return view('exames.index', compact('data'));
    }

    public function create() {
        
        return view('exames.create');
    }

    public function store(Request $request) {

        $request->validate([
            'nome' => 'required|max:50|min:10',
            ]);

        Exame::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'dataExame' => $request->dataExame,
            'observacao' => $request->observacao,
        ]);
        
        return redirect()->route('exames.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $data = Exame::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('exames.edit', compact('data'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Exame::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'dataExame' => $request->dataExame,
            'observacao' => $request->observacao,
        ]);

        $obj->save();

        return redirect()->route('exames.index');
    }

    public function destroy($id) {
        
        $obj = Exame::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('exames.index');
    }
}