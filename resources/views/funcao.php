<?php

REQUIRE_ONCE ("conexao.php");
REQUIRE_ONCE ("relatorios.php");

function executeStoredProcedure($strSql) {
global $conexao;
global $strSql;

$rstExe = mysqli_query($conexao, $strSql);

}