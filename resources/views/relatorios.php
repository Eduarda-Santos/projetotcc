@extends('templates.main', ['titulo' => "Relatórios", 'rota' => "relatorios"])

@section('titulo') Relatórios @endsection
@section('conteudo')

<!DOCTYPE html>
<?php
REQUIRE_ONCE "conexao.php";
REQUIRE_ONCE "funcao.php";
$result = "CALL listar()";
$rstSql = executeStoredProcedure($result);
while ($rows = mysqli_fetch_assoc($rstSql)){   

echo $rows[nome]; 

}
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap core CSS -->
        <link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="boostrap/css/bootstrap-theme.min.css" rel="stylesheet">
    </head>
    <body>

    </body>
</html>
@endsection