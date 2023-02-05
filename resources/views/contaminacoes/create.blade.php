@extends('templates/main', ['titulo'=>"Nova Contaminação"])

@section('conteudo')

<?php

// Conectando
$link = mysql_connect('localhost', 'root', 'admin')or die('Could not connect: ' . mysql_error());
echo 'Connected successfully' . "\n";
// Selecionando banco de dados
mysql_select_db('test') or die('Could not select database');

// Executando consulta SQL
$query = 'SELECT nome FROM contaminacoes';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Imprimindo resultados em HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
                echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
}
echo "</table>\n";

//  Liberando memória
mysql_free_result($result);

// Fechando conexão
mysql_close($link);
?>

    @can('create', $item)
    <a href= "{{ route('contaminacoes.create', $item) }}" class="btn btn-success">
    <form action="{{ route('contaminacoes.store') }}" method="POST">
        @csrf
        <select name="contaminacao" id="nome">         
            <?php
                echo "<option value='0'>Selecione</option>";
                echo $option;
            ?>        
        </select>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <select aria-label="Default select example" class="form-select @if($errors->has('id_funcionario')) is-invalid @endif" name="id_funcionario" value="{{old('id_funcionario')}}">
                        <option for="id_funcionario"  value="id_funcionario">Feminino</option>
                        <option for="sexo" value="Masculino">Masculino</option>
                        <option for="sexo" value="0">Prefiro não opinar</option>
                    </select>
                    <label>Sexo do Funcionário</label>
                    @if($errors->has('id_funcionario'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('id_funcionario') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('dataInicioSintomas')) is-invalid @endif" name="dataInicioSintomas" placeholder="Data Início dos Sintomas" value="{{old('dataInicioSintomas')}}" />
                    <label for="dataInicioSintomas">Data Início dos Sintomas</label>
                    @if($errors->has('dataInicioSintomas'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('dataInicioSintomas') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('dataInicioAfastamento')) is-invalid @endif" name="dataInicioAfastamento" placeholder="Data Início do Afastamento" value="{{old('dataInicioAfastamento')}}" />
                    <label for="dataInicioAfastamento">Data Início do Afastamento</label>
                    @if($errors->has('dataInicioAfastamento'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('dataInicioAfastamento') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('dataRealizacaoExame')) is-invalid @endif" name="dataRealizacaoExame" placeholder="Data da Realização do Exame" value="{{old('dataRealizacaoExame')}}" />
                    <label for="dataRealizacaoExame">Data da Realização do Exame</label>
                    @if($errors->has('dataRealizacaoExame'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('dataRealizacaoExame') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('resultadoExame')) is-invalid @endif" name="resultadoExame" placeholder="Resultado do Exame" value="{{old('resultadoExame')}}" />
                    <label for="resultadoExame">Resultado do Exame</label>
                    @if($errors->has('resultadoExame'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('resultadoExame') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('dataTerminoAfastamento')) is-invalid @endif" name="dataTerminoAfastamento" placeholder="Data Término do Afastamento" value="{{old('dataTerminoAfastamento')}}" />
                    <label for="dataTerminoAfastamento">Data Término do Afastamento</label>
                    @if($errors->has('dataTerminoAfastamento'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('dataTerminoAfastamento') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @if($errors->has('descricao')) is-invalid @endif" name="descricao" placeholder="Descrição" value="{{old('descricao')}}" />
                    <label for="descricao">Descrição</label>
                    @if($errors->has('descricao'))
                    <div class='invalid-feedback'>
                        {{ $errors->first('descricao') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{route('contaminacoes.index')}}" class="btn btn-secondary btn-block align-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
                    </svg>
                    &nbsp; Voltar
                </a>
                <a href="javascript:document.querySelector('form').submit();" class="btn btn-success btn-block align-content-center">
                    Confirmar &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                </a>
            </div>
        </div>
        @if(isset($errors))
        @foreach($errors->all() as $erro)
        <div class="alert alert-danger">
            {{ $erro }}
        </div>
        @endforeach
        @endif
    </form>
    </a>
    @endcan
@endsection