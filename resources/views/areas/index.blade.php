@extends('templates.middleware', ['titulo' => "Áreas", 'rota' => "areas.create"])

@section('titulo') Cursos @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'Áreas'"
                :header="['NOME','AÇÕES']" 
                :data="$data"
                :fields="['nome']"
                :hide="[true, false]" 
                :crud="'areas'"
                :info="['nome']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection