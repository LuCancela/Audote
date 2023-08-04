<?php 
// quando o usuario deslogar será retirado as informções dele NO SITE não no banco

require 'config.php';
$_SESSION = []; // limpa todas as variáveis armazenadas na sessão atual. A variável superglobal $_SESSION é usada para armazenar dados da sessão em PHP, e atribuir um array vazio a ela remove todos os dados existentes
session_unset(); //remove todas as variáveis de sessão. Isso garante que todas as variáveis de sessão sejam removidas, mesmo que você tenha definido outras além da superglobal $_SESSION
session_destroy(); // destrói a sessão atual. Isso encerra a sessão do usuário e remove todos os dados associados a ela. É importante notar que o uso desta função não remove automaticamente as variáveis de sessão, é por isso que a função session_unset() é chamada anteriormente
header("location: reglog.php"); // redireciona a pessoa para a página reglog.php
?>