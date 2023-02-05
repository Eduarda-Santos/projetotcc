<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>MCI</title>
    <style> 
        .input-group-text { 
            min-width: 120px;
        }
    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-secondary">
        <div class="container-fluid">
            <a href="{{route('index')}}" class="navbar-brand ms-sm-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-map" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                </svg>
                <span class="ms-3 fs-5">MCI - MONITORAMENTO DE CONTAMINAÇÕES EM INSTITUIÇÕES</span>
            </a>
            <div class="collapse navbar-collapse" id="itens">
                <ul class="navbar-nav ms-auto">
                    
                     <li class="nav-item dropdown ps-2">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-border-width" viewBox="0 0 16 16">
                                <path d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-2zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            <span class="ps-1 text-white">Opções</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><a href="{{route('funcionarios.index')}}" class="dropdown-item" type="button">Funcionários</a></li>
                            <li><a href="{{route('vacinas.index')}}" class="dropdown-item" type="button">Vacinas</a></li>
                            <li><a href="{{route('areas.index')}}" class="dropdown-item" type="button">Áreas</a></li>
                            <li><a href="{{route('contaminacoes.index')}}" class="dropdown-item" type="button">Contaminações</a></li>
                            <li><a href="{{route('vacinasFuncionario.index')}}" class="dropdown-item" type="button">Vacina dos Funcionários</a></li>
                            <li><a href="{{route('relatorios')}}" class="dropdown-item" type="button">Relatórios</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 
    <div class="container py-4">
        <div class="row">
            <div class="col">
                <h3 class="text-secondary d-none d-md-block"><b>{{ $titulo }}</b></h3>
            </div>
            @if(isset($rota))
                <div class="col d-flex justify-content-end">
                    <a href= "{{ route($rota) }}" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
        <hr>
        @yield('conteudo')
    </div>
    <div class="container">
        <div class="row marcador align-items-center">
            <div class="col mx-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" fill="currentColor" class="bi bi-map" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                </svg>
            </div>
        </div> 
    </div>
    <div class="container py-4">
        <div class="row">
            <div class="col">
                <h3 class="text-secondary d-none d-md-block"><b>{{ $titulo }}</b></h3>
            </div>
            @if(isset($rota))
                <div class="col d-flex justify-content-end">
                    <a href= "{{ route($rota) }}" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                    </a>
                </div>
            @endif
            <div class="mx-auto" style="width: 700px;">
                <h1 class="h1">MCI</h1>
            </div>
        </div>
        <hr>
        @yield('conteudo')
    </div>
    <div class="container">
        <div class="row">
            <div class="row justify-content-end">
                <div class="col-5">
                    <a href="{{route('login')}}" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Login</a> 
                </div>
                <div class="col-4">
                <a href="{{route('register')}}" class="btn btn-secondary btn-lg" role="button" aria-pressed="true">Cadastro</a>          
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">

    $(document).ready(function(){
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.money2').mask("#.##0,00", {reverse: true});
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {reverse: true});
        $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
        $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
        $('.fallback').mask("00r00r0000", {
            translation: {
                'r': {
                pattern: /[\/]/,
                fallback: '/'
                },
                placeholder: "__/__/____"
            }
        });
        $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
    });

    function showInfoModal(data, fields) {
        data = JSON.parse(data)
        fields = JSON.parse(fields)

        $('#infoModal').modal().find('.modal-body').html(""); 
        for(let a=0; a<fields.length; a++) {
            $('#infoModal').modal().find('.modal-body').append("<b>" + data[fields[a]] + "</b><br>");
        }
        $("#infoModal").modal('show');
    }

    function closeInfoModal() {
        $("#infoModal").modal('hide');
    }

    function showRemoveModal(id, nome) {
        $('#id_remove').val(id);
        $('#removeModal').modal().find('.modal-body').html("");
        $('#removeModal').modal().find('.modal-body').append("Deseja remover o registro <b class='text-danger'>'"+nome+"'</b> ?");
        $("#removeModal").modal('show')
    }

    function closeRemoveModal() {
        $("#removeModal").modal('hide')
    }

    function remove() {

        let id = $('#id_remove').val();
        let form = "form_" + $('#id_remove').val();
        document.getElementById(form).submit();
        $("#removeModal").modal('hide')
    }

</script>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('script')
</html>