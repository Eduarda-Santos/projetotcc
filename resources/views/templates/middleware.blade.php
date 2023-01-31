<!DOCTYPE html>
<html lang="pt-br">
    @can('create', 'App/Models/Funcionario')
        @if(isset($rota))
            <div class="col d-flex justify-content-end">
                <a href= "{{ route($rota) }}" class="btn btn-secondary"></a>
            </div>
        @endif
    @endcan
</html>
