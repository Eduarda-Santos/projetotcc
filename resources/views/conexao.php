<?php
REQUIRE_ONCE "conexao.php";
REQUIRE_ONCE "funcao.php";

    $conexao = mysqli_connect("localhost", "root", "", "projetotcc") or print (mysql_error()); 
    $result = mysqli_query($conexao, "CALL listar();") or die("Erro na query da procedure: " . mysqli_error());

    while ($row = mysqli_fetch_array($result)) {   
        echo  $row[0] . "<br>\n" ; 
    }
?>
