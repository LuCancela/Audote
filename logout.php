<?php 
// quando o usuario deslogar será retirado as informções dele NO SITE não no banco

// deixa a $_SESSION vazia, exclui todas as variaveis guardadas nela e depois volta para a página de cadastro
require 'config.php';
$_SESSION = [];
session_unset();
session_destroy();
header("location: reglog.php");
?>