@extends('templates.main', ['titulo' => "Contaminações", 'rota' => "contaminacoes.create"])

@section('titulo') Contaminações @endsection

@section('conteudo')
    @can('viewAny', $item)
        <a href= "{{ route('cursos.index', $item) }}" class="btn btn-success">
            <div class="row">
                <div class="col">
                    
                    <x-datalist
                        :title="'Contaminações'"
                        :header="['INÍCIO SINTOMAS','INÍCIO AFASTAMENTO','REALIZAÇÃO EXAME','RESULTADO EXAME','TÉRMINO AFASTAMENTO','ANEXO','DESCRIÇÃO']" 
                        :data="$data"
                        :fields="['funcionario_id','dataInicioSintomas','dataInicioAfastamento','dataRealizacaoExame','resultadoExame','dataTerminoAfastamento','anexo','descricao']"
                        :hide="[true, true, true, true, true, true, true, true, false]" 
                        :crud="'contaminacoes'"
                        :info="['funcionario_id','dataInicioSintomas','dataInicioAfastamento','dataRealizacaoExame','resultadoExame','dataTerminoAfastamento','anexo','descricao']"
                        :remove="'nome'"
                    />

                </div>
            </div>
        </a>
    @endcan
@endsection