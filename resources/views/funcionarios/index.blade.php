@extends('templates.main', ['titulo' => "funcionarios", 'rota' => "funcionarios.create"])

@section('titulo') Funcionarios @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'funcionarios'"
                :header="['NOME', 'AÇÕES']" 
                :data="$data"
                :fields="['nome']"
                :hide="[true, true, false]" 
                :crud="'funcionarios'"
                :info="['nome']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection