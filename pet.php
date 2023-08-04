<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en" class="audote-root">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/34e911297d.js" crossorigin="anonymous"></script>
    <title>Index</title>
    <link rel="stylesheet" href="style-inicio.css">
    <link rel="stylesheet" href="src/style/pet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="src/style/pgprincipal.css" />
</head>

<body>

    <?php include('./secoes/nav.php') ?>

    <?php 
    
    $idPet = $_GET['idPet']; // pega o idPet de outra página com o método get

    $stmt = $pdo->prepare("SELECT * FROM `pets` WHERE idPet = $idPet;"); // prepara o código SQL   
	$stmt ->execute(); // executa o código onde irá ser selecionado na tabela pets todos os campos com o idPet sendo igual ao selecionado
    $row = $stmt ->fetch(PDO::FETCH_BOTH); // irá colocar uma matriz na variavel $row com todos os campos da tabela selecionada e com o filtro aplicado
    $caracTexto = $row['caracteristicas']; // salva os dados do banco de dados em uma variavel 
    $caracArray = explode(',', $caracTexto);
    ?>

            <!-- pet-details-area -->
            <section class="pet-details-area mt-100">
                <div class="container">
                    <div class="row">
                        <div>
                            <div class="pet-details-content">
                                <h4 class="title"><?php echo $row['nomePet'] ?></h4>
                                <p><?php echo $row['descricao'] ?></p>
                                <div class="pet-details-img">
                                    <img src="<?php echo $row['imagemPet'] ?>" alt="">
                                </div>
                                <h4 class="title">Características de <?php echo $row['nomePet'] ?></h4>

                                <div class="caracteristicas">
                                    <p><?php foreach($caracArray as $caracteristica) {
                                        echo "<span class='caracteristica'> $caracteristica </span>";
                                    } ?></p>
                                </div>
                                
                                <div class="pet-dog-info">
                                    <h5 class="title">Informações do Pet</h5>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-4 col-6">
                                            <div class="pet-info-item">
                                                <h6>Sexo:</h6>
                                                <span><?php echo $row['sexo'] ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-6">
                                            <div class="pet-info-item">
                                                <h6>Idade:</h6>
                                                <span><?php echo$row['idadePet'] ?> ano(s)</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-6">
                                            <div class="pet-info-item">
                                                <h6>Tipo de animal:</h6>
                                                <span><?php echo $row['tipoAnimal'] ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-6">
                                            <div class="pet-info-item">
                                                <h6>Porte:</h6>
                                                <span><?php echo $row['porte'] ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-6">
                                            <div class="pet-info-item">
                                                <h6>Raça:</h6>
                                                <span><?php echo $row['raca'] ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-6">
                                            <div class="pet-info-item">
                                                <h6>Vacinado:</h6>
                                                <span><?php echo $row['vacinas'] ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-6">
                                            <div class="pet-info-item">
                                                <h6>Vermifugado:</h6>
                                                <span><?php echo $row['vermifugado'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="botao"> <i class="fa-solid fa-paw"></i> Adote já</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- pet-details-area-end -->



    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/pgprincipal.js"></script>
    <script src="./src/js/app.js"></script>
</body>

</html>