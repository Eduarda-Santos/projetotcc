<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>MCI</title>

    <style> 
        .input-group-text { 
            min-width: 120px;
        }
    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-success">
        <div class="container-fluid">
        <a href="{{route('index')}}" class="navbar-brand ms-sm-3">
                <img src="{{ asset('images/map.jpg') }}" alt="map">
                <span class="ms-3 fs-5">MCI - MONITORAMENTO DE CONTAMINAÇÕES EM INSTITUIÇÕES</span>
            </a>
            <div class="collapse navbar-collapse" id="itens">
                <ul class="navbar-nav ms-auto">
                     <li class="nav-item dropdown ps-2">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                              </svg>
                            <span class="ps-1 text-white">Opções</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('funcionarios.index')}}" class="dropdown-item">Funcionarios</a></li>
                            <li><a href="{{route('vacinas.index')}}" class="dropdown-item">Vacinas</a></li>
                            <li><a href="{{route('areas.index')}}" class="dropdown-item">Areas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ps-2 me-3">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            <span class="ps-1 text-white">Sair</span>
                        </a>
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
</body>
<nav class="navbar fixed-bottom navbar-dark bg-success">
    <div class="container-fluid">
        <span class="text-white fw-light"></span>
    </div>
</nav>

<div class="modal fade" tabindex="-1" id="infoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Mais Informações</h5>
                <button type="button" class="btn-close" data-bs-dismiss="infoModal" onclick="closeInfoModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body text-secondary">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-block align-content-center" onclick="closeInfoModal()">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="removeModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger">Operação de Remoção</h5>
          <button type="button" class="btn-close" data-bs-dismiss="removeModal" onclick="closeRemoveModal()" aria-label="Close"></button>
        </div>
        <input type="hidden" id="id_remove">
        <div class="modal-body text-secondary">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-block align-content-center" onclick="closeRemoveModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                </svg>
                &nbsp; Não
            </button>
          <button type="button" class="btn btn-danger" onclick="remove()">
                Sim &nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
          </button>
        </div>
      </div>
    </div>
</div>

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
@yield('script')
</html>