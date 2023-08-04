<?php 

include("config.php");
$id = $_SESSION["id"];
//resgata as informações do formulário 
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];

$stmt = $pdo->prepare(
    "update usuarios set
    nome = '$nome',
    sobrenome = '$sobrenome',
    cpf = '$cpf',
    telefone = '$telefone',
    cep = '$cep',
    logradouro = '$logradouro',
    estado = '$estado',
    cidade = '$cidade',
    bairro = '$bairro',
    numero = '$numero'
    where id = '$id';
    ");

$stmt -> execute();

header("location:perfil.php"); 


?>