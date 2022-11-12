@extends('templates.main', ['titulo' => "Contaminações", 'rota' => "contaminacoes.create"])

@section('titulo') Contaminações @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'Contaminações'"
                :header="['DOSE','DATA DA VACINA','LOTE']" 
                :data="$data"
                :fields="['dataInicioSintomas','dataInicioAfastamento','dataRealizacaoExame','resultadoExame','dataTerminoAfastamento','anexo','descricao']"
                :hide="[true, true, true, true, true, true, true, false]" 
                :crud="'contaminacoes'"
                :info="['dataInicioSintomas','dataInicioAfastamento','dataRealizacaoExame','resultadoExame','dataTerminoAfastamento','anexo','descricao']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection