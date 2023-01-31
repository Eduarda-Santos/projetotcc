@extends('templates.middleware', ['titulo' => "Funcionários", 'rota' => "funcionarios.create"])

@section('titulo') Funcionários @endsection
@section('conteudo')

@if(UserPermissions::isAuthorized('funcionarios.edit'))
    <a href= "{{ route('funcionarios.edit', '1') }}" class="btn btn-success">
        <div class="row">
            <div class="col">
                
                <x-datalist
                    :title="'Funcionários'"
                    :header="['NOME', 'TELEFONE','E-MAIL', 'ENDEREÇO', 'SEXO', 'DATA DE NASCIMENTO', 'TELEFONE DE EMERGÊNCIA', 'ATIVO', 'AÇÕES']" 
                    :data="$data"
                    :fields="['nome', 'telefone', 'email', 'endereco', 'sexo', 'dataNascimento', 'telefoneEmergencia', 'ativo']"
                    :hide="[true, true, true, true, true, true, true, true, false]" 
                    :crud="'funcionarios'"
                    :info="['nome','telefone', 'email', 'endereco', 'sexo', 'dataNascimento', 'telefoneEmergencia', 'ativo']"
                    :remove="'nome'"
                />

            </div>
        </div>
    </a>
@endsection