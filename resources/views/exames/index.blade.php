@extends('templates.main', ['titulo' => "Exames", 'rota' => "exames.create"])

@section('titulo') Exames @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'Exames'"
                :header="['NOME','DATA DO EXAME','OBSERVAÇÃO','AÇÕES']" 
                :data="$data"
                :fields="['nome', 'dataExame','observacao']"
                :hide="[true, true, true, false]" 
                :crud="'exames'"
                :info="['nome','dataExame','observacao']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection