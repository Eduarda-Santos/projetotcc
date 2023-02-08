@extends('templates.middleware', ['titulo' => "Áreas", 'rota' => "areas.create", 'permissions' => '0'])

@section('titulo') Cursos @endsection

@section('conteudo')
    @can('viewAny', $item)
        <a href= "{{ route('areas.index', $item) }}" class="btn btn-success">
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
        </a>
    @endcan
@endsection