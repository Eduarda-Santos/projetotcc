@extends('templates.middleware', ['titulo' => "Funcionários", 'rota' => "funcionarios.create"])

@section('titulo') Funcionários @endsection
@section('conteudo')

@can('update', $item)
<a href= "{{ route('funcionarios.edit', $item) }}" class="btn btn-success"></a>
@endcan
@can('view', $item)
<a href= "{{ route('funcionarios.show', $item) }}" class="btn btn-primary"></a>
@endcan
@can('delete', $item)
<a nohref style="cursor:pointer" onclick="document.getElementById('form_1').submit()" class="btn btn-danger"></a>
@endcan


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
@endsection