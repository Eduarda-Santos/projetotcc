<?php

namespace App\Http\Controllers;
use App\Models\Area;

use Illuminate\Http\Request;

class AreaController extends Controller {
    
    public function index() {
        $this->authorize('viewAny', Area::class);
        $data = Area::paginate(5);
        $data = Area::all();
        return view('areas.index', compact('data'));
    }

    public function create() {
        $this->authorize('create', Area::class);
        return view('areas.create');
    }

    public function store(Request $request) {
        $this->authorize('update', $area);
        Area::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
        ]);
        
        return redirect()->route('areas.index');
    }

    public function show($id) { }

    public function edit(Request $request, $id, Area $area) {
        $this->authorize('update', $area);
        $data = Area::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('areas.edit', compact('data'));    
    }

    public function update(Request $request, $id, Area $area) {
     
        $obj = Area::find($id);

        $this->authorize('create', Area::class);
        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
        ]);

        $obj->save();

        return redirect()->route('areas.index');
    }

    public function destroy(Request $request, $id, Area $area) {
        $this->authorize('delete', $area);
        $obj = Area::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('areas.index');
    }
}