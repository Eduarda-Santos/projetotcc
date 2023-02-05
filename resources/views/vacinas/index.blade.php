@extends('templates.middleware', ['titulo' => "Vacinas", 'rota' => "vacinas.create"])

@section('titulo') Vacinas @endsection

@section('conteudo')
    @can('viewAny', $item)
        <a href= "{{ route('cursos.index', $item) }}" class="btn btn-success">
            <div class="row">
                <div class="col">
                    
                    <x-datalist
                        :title="'Vacinas'"
                        :header="['NOME','OBSERVAÇÃO','AÇÕES']" 
                        :data="$data"
                        :fields="['nome', 'observacao']"
                        :hide="[true, true, false]" 
                        :crud="'vacinas'"
                        :info="['nome', 'observacao']"
                        :remove="'nome'"
                    />
                </div>
            </div>
        </a>
    @endcan
@endsection