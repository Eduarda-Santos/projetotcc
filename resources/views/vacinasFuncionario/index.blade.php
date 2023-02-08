@extends('templates.middleware', ['titulo' => "Vacinas dos Funcionários", 'rota' => "vacinasFuncionario.create"])

@section('titulo') Vacinas dos Funcionários @endsection

@section('conteudo')
    @can('viewAny', $item)
        <a href= "{{ route('cursos.index', $item) }}" class="btn btn-success">
            <div class="row">
                <div class="col">
                    
                    <x-datalist
                        :title="'Vacinas dos Funcionários'"
                        :header="['DOSE','DATA DA VACINA','LOTE','AÇÕES']" 
                        :data="$data"
                        :fields="['dose','dataVacina','lote']"
                        :hide="[true, true, true, false]" 
                        :crud="'vacinasFuncionario'"
                        :info="['dose','dataVacina','lote']"
                        :remove="'nome'"
                    />

                </div>
            </div>
        </a>
    @endcan
@endsection