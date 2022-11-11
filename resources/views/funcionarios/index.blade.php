@extends('templates.main', ['titulo' => "Funcionários", 'rota' => "funcionarios.create"])

@section('titulo') Cursos @endsection
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <x-datalist
                :title="'Funcionários'"
                :header="['NOME', 'TELEFONE', 'ENDEREÇO', 'SEXO', 'DATA DE NASCIMENTO', 'TELEFONE DE EMERGENCIA', 'ATIVO', 'AÇÕES']" 
                :data="$data"
                :fields="['nome', 'telefone', 'endereco', 'sexo', 'dataNascimento', 'telefoneEmergencia', 'ativo']"
                :hide="[true, true, true, true, true, true, true, false]" 
                :crud="'funcionarios'"
                :info="['nome','telefone', 'endereco', 'sexo', 'dataNascimento', 'telefoneEmergencia', 'ativo']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection