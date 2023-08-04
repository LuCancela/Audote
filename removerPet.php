<?php

    include("config.php");

    $idPet = $_GET['idPet']; // Pega o id de outra página pelo metodo GET

    $stmt = $pdo->prepare("delete from pets where idPet = $idPet"); //prepara o código sql e armazena ele em uma variavel
	$stmt ->execute(); // executa o código e deleta os dados com referencia ao id escolhido

    header("location:gerenciarpets.php"); //redireciona o usuario para a página gerenciarpet.php


?>