<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Facades\UserPermissions;

use Illuminate\Http\Request;

class FuncionarioController extends Controller {
    
    public function index() {

        if(!PermissionController::isAuthorized('cursos.index')) {
            abort(403);
            }
            $permissions = session('user_permissions');
            return view('funcionarios.index', compact('permissions'));

        
        $data = Funcionario::paginate(5);
        $data = Funcionario::all();
        //$this->authorize('viewAny', Funcionario::class);
        //return view('funcionarios.index', compact('data'));

    }

    public function create() {
        $this->authorize('create', Funcionario::class);
        return view('funcionarios.create');
    }

    public function store(Request $request) {

        $this->authorize('create', Funcionario::class);

        Funcionario::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'dataNascimento' => $request->dataNascimento,
            'telefoneEmergencia' => $request->telefoneEmergencia,
            'ativo' => 1,
        ]);
        
        return redirect()->route('funcionarios.index');
    }

    public function show($id) { }

    public function edit($id, Funcionario $funcionario) {

        $this->authorize('update', $data);
        
        $data = Funcionario::find($id);

        if(!isset($data)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('funcionarios.edit', compact('data'));    
    }

    public function update(Request $request, $id, Funcionario $funcionario) {

        $this->authorize('update', $funcionario);
     
        $obj = Funcionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'dataNascimento' => $request->dataNascimento,
            'telefoneEmergencia' => $request->telefoneEmergencia,
            'ativo' => $request->ativo,
        ]);

        $obj->save();

        return redirect()->route('funcionarios.index');
    }

    public function destroy($id, Funcionario $funcionario) {

        $this->authorize('delete', $funcionario);
        
        $obj = Funcionario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('funcionarios.index');
    }

    public function __construct() {
        $this->middleware('Mid');
    }
        
}