<?php

REQUIRE_ONCE ("conexao.php");

function executeStoredProcedure($strSql) {
global $conexao;
$rstExe = mysqli_query($conexao, $strSql);

}