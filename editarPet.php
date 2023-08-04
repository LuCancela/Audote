<?php
include("config.php");

//resgata as informações do formulário 
$idPet = $_POST['idPet'];
$nomePet = $_POST['nomePet'];
$tipoAnimal = $_POST['tipoAnimal'];
$raca = $_POST['raca'];
$idadePet = $_POST['idadePet'];
$porte = $_POST['porte'];
$sexo = $_POST['sexo'];
$descricao = $_POST['descricao'];
$vacinas = $_POST['vacinas'];
$vermifugado = $_POST['vermifugado'];
$imagemPet = $_FILES['imagemPet']['tmp_name'];
$caracteristicas = $_POST['caracteristicas'];

if (!empty($imagemPet)) {
    // atribui o nome temporário do arquivo enviado à variável $imagemPet. O arquivo temporário é criado no servidor quando o arquivo é enviado através do formulário.
    
    $img_data = addslashes(file_get_contents($imagemPet));
    
    
    if ($_FILES['imagemPet']['name']) { //verifica se o arquivo enviado tem um nome. Se sim, significa que um arquivo foi selecionado no formulário.
        $imagemPet = $_FILES['imagemPet']['name']; //atribui o nome do arquivo original à variável $imagemPet.
        $imagemPet_temp = $_FILES['imagemPet']['tmp_name']; //atribui novamente o nome temporário do arquivo à variável $imagemPet_temp.
        $destino = 'src/img/pets/' . $imagemPet; //define o caminho de destino para o arquivo, que neste caso é uma pasta chamada "src/img" seguida pelo nome do arquivo original. Essa linha pode ser modificada para ajustar o caminho de destino desejado.
        move_uploaded_file($imagemPet_temp, $destino); // move o arquivo temporário para o destino especificado. Essa função move o arquivo do local temporário para o caminho de destino desejado, tornando-o permanente no servidor.
    }
} else {
    $imagem = $pdo->prepare("SELECT * FROM pets WHERE idPet = '$idPet';");
    $imagem ->execute();
    $imagemlinha = $imagem->fetch(PDO::FETCH_BOTH);
    $destino = $imagemlinha['imagemPet'];
}


// cria uma array e separa cada elemento pela virgula
$caracArray = explode(',', $caracteristicas);

// Remover espaços em branco antes e depois de cada valor
$caracArray = array_map('trim', $caracArray);

// Converter o array em uma string separada por vírgulas

if (!empty($caracArray)) {
    $caracTexto = implode(',', $caracArray);
} else {
    $caracTexto = 'Não foram adicionadas caracteristicas'; // Ou qualquer valor padrão que você desejar
}


    $stmt = $pdo->prepare(
        "update pets set
        nomePet = '$nomePet',
        tipoAnimal = '$tipoAnimal',
        raca = '$raca',
        idadePet = '$idadePet',
        porte = '$porte',
        sexo = '$sexo',
        descricao = '$descricao',
        vacinas = '$vacinas',
        vermifugado = '$vermifugado',
        imagemPet = '$destino',
        caracteristicas = '$caracTexto'
        where idPet = '$idPet';
        "
        
    );	  // prepara o código sql  
	$stmt ->execute();    // executa o código alterando os dados da tabela pet onde o id for igual o pré estabelecido

    header("location:gerenciarpets.php"); // redireciona para a página gerenciarpet.php

?>