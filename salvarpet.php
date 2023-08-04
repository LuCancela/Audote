<?php

include("config.php");

$idUsuario = $_SESSION["id"];

// Pega todas os campos do formulário e salva eles em suas respectivas variaveis
$nomePet = $_POST['nomePet'];
$tipoAnimal = $_POST['tipoAnimal'];
$raca = $_POST['raca'];
$idadePet = $_POST['idadePet'];
$porte = $_POST['porte'];
$sexo = $_POST['sexo'];
$descricao = $_POST['descricao'];
$vacina = $_POST['vacina'];
$vermifugado = $_POST['vermifugado'];
$imagemPet = $_FILES['imagemPet']['tmp_name'];
$caracteristicas = $_POST['caracteristicas'];

// atribui o nome temporário do arquivo enviado à variável $imagemPet. O arquivo temporário é criado no servidor quando o arquivo é enviado através do formulário.

$img_data = addslashes(file_get_contents($imagemPet));

//lê o conteúdo do arquivo temporário e o armazena na variável $img_data. A função file_get_contents() é usada para obter o conteúdo do arquivo, e addslashes() é usada para adicionar barras invertidas a caracteres especiais, ajudando a evitar problemas de segurança.

if ($_FILES['imagemPet']['name']) { //verifica se o arquivo enviado tem um nome. Se sim, significa que um arquivo foi selecionado no formulário.
    $imagemPet = $_FILES['imagemPet']['name']; //atribui o nome do arquivo original à variável $imagemPet.
    $imagemPet_temp = $_FILES['imagemPet']['tmp_name']; //atribui novamente o nome temporário do arquivo à variável $imagemPet_temp.
    $destino = 'src/img/pets' . $imagemPet; //define o caminho de destino para o arquivo, que neste caso é uma pasta chamada "src/img" seguida pelo nome do arquivo original. Essa linha pode ser modificada para ajustar o caminho de destino desejado.
    move_uploaded_file($imagemPet_temp, $destino); // move o arquivo temporário para o destino especificado. Essa função move o arquivo do local temporário para o caminho de destino desejado, tornando-o permanente no servidor.
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


// Armazena na váriavel $sql o código sql para adicionar na tabela os valores do formulário
$sql = "INSERT INTO pets (idPet, nomePet, tipoAnimal, raca, idadePet, porte, sexo, descricao, vacinas, vermifugado, imagemPet, caracteristicas, idUsuario) 
                    VALUES (null, '$nomePet', '$tipoAnimal', '$raca', '$idadePet', '$porte', '$sexo', '$descricao', '$vacina', '$vermifugado', '$destino', '$caracTexto', '$idUsuario')";

$stmt = $pdo->prepare($sql); // prepara o sql e armazena em outra variavel

$stmt->execute(); // executa o código e adiciona todos os valores na tabela
header("location:index.php"); // redireciona o usuário para a página audote.php

?>