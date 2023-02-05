<?php

namespace App\Http\Controllers;
use App\Models\Vacina;

use Illuminate\Http\Request;

class VacinaController extends Controller {
    
    public function index() {
        $this->authorize('viewAny', vacina::class);
        $data = vacina::paginate(5);
        $data = Vacina::all();
        return view('vacinas.index', compact('data'));
    }

    public function create() {
        $this->authorize('create', vacina::class);
        return view('vacinas.create');
    }

    public function store(Request $request, $id, Vacina $vacina) {
        $this->authorize('create', vacina::class);
        Vacina::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'observacao' => $request->observacao,
        ]);
        
        return redirect()->route('vacinas.index');
    }

    public function show($id) { }

    public function edit(Request $request, $id, Vacina $vacina) {
        $this->authorize('update', $data);
        $data = Vacina::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('vacinas.edit', compact('data'));    
    }

    public function update(Request $request, $id, Vacina $vacina) {
        $this->authorize('update', $vacina);
        $obj = Vacina::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'observacao' => $request->observacao,
        ]);

        $obj->save();

        return redirect()->route('vacinas.index');
    }

    public function destroy(Request $request, $id, Vacina $vacina) {

        $this->authorize('delete', $vacina);
        $obj = Vacina::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('vacinas.index');
    }
}