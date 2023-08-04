<?php 

session_start();

	// conexão com o banco de dados local
    $conn = mysqli_connect("localhost", "root", "", "audote");
	
    $servidor="localhost";
	$banco="audote";
	$usuario="root";
	$senha="";
	
	// Conexão com o banco de dados do servidor hospedado na interwebs
    // $conn = mysqli_connect("sql213.epizy.com", "epiz_33977329", "PEfvg2chF8P", "epiz_33977329_audote");
	
    // $servidor="sql213.epizy.com";
	// $banco="epiz_33977329_audote";
	// $usuario="epiz_33977329";
	// $senha="PEfvg2chF8P";


	$pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>