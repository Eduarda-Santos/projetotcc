@extends('templates.main', ['titulo' => "Vacinas", 'rota' => "vacinas.create"])

@section('titulo') Vacinas @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'Vacinas'"
                :header="['NOME','OBSERVAÇÃO','AÇÕES']" 
                :data="$data"
                :fields="['nome', 'observaocao']"
                :hide="[true, true, false]" 
                :crud="'vacinas'"
                :info="['nome', 'observaocao']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection