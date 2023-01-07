<?php

namespace App\Http\Controllers;
use App\Models\Area;

use Illuminate\Http\Request;

class AreaController extends Controller {
    
    public function index() {
        $data = Area::all();
        return view('areas.index', compact('data'));
    }

    public function create() {
        
        return view('areas.create');
    }

    public function store(Request $request) {

        Area::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
        ]);
        
        return redirect()->route('areas.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $data = Area::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('areas.edit', compact('data'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Area::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
        ]);

        $obj->save();

        return redirect()->route('areas.index');
    }

    public function destroy($id) {
        
        $obj = Area::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('areas.index');
    }
}