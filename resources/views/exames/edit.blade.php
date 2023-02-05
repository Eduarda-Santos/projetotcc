@extends('templates/main', ['titulo'=>"Alterar Exames"])

@section('conteudo')
    @can('update', $item)
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        <form action="{{ route('exames.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if($errors->has('nome')) is-invalid @endif" name="nome" placeholder="Nome" value="{{old('nome')}}" />
                        <label for="nome">Nome do Exame</label>
                        @if($errors->has('nome'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('nome') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control @if($errors->has('dataExame')) is-invalid @endif" name="dataExame" placeholder="Data do Exame" value="{{old('dataExame')}}" />
                        <label for="dataExame">Data do Exame</label>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        @if($errors->has('dataExame'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('dataExame') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if($errors->has('observacao')) is-invalid @endif" name="observacao" placeholder="Observação" value="{{old('observacao')}}" />
                        <label for="observacao">Observação dos Exames</label>
                        @if($errors->has('observacao'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('observacao') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{route('exames.index')}}" class="btn btn-secondary btn-block align-content-center">
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
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>flatpickr("input[type=datetime-local]");</script> 
        </form>
    @endcan
@endsection