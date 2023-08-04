<?php
include('config.php');

$pagina = 1;
$limite = 3;

if(isset($_GET['pagina'])){
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
}

if (!$pagina){
    $pagina = 1;
}

$quantidade = $pdo->prepare("SELECT COUNT(*) FROM pets");
$quantidade->execute();

$quantidadelinha = $quantidade->fetch((PDO::FETCH_BOTH));

$paginas = ceil($quantidadelinha[0] / $limite);

$inicio = ($pagina * $limite) - $limite;

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM pets WHERE 
    nomePet LIKE '%$data%' OR
    tipoAnimal LIKE '%$data%' OR
    raca LIKE '%$data%' OR
    idadePet LIKE '%$data%' OR
    porte LIKE '%$data%' OR
    sexo LIKE '%$data%' OR
    descricao LIKE '%$data%'
    ";
} else {
    $sql = "SELECT * FROM pets LIMIT $inicio, $limite";
}



?>
<!DOCTYPE html>
<html lang="pt-br" class="audote-root">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <script src="https://kit.fontawesome.com/34e911297d.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="src/style/pgprincipal.css" />

    <title>Audote - Todos os pets</title>
</head>

<body>

    <?php include('./secoes/nav.php') ?>

    <section class="page-header-simple" style="background-color: var(--SecondaryColor);">
        <div class="container">
            <h1>Procure o seu pet ideal</h1>
            <div class="hero-subtitle">Encontre seu melhor amigo agora e salve uma vida</div>
            <div class="hero-form hero-form-round large mt-3 mt-lg-4">
                <form class="row align-items-center">
                    <div class="col-12 col-lg">
                        <div class="input-group mb-lg-0">
                            <input type="text" class="form-control" placeholder="Nome do pet ou palavra-chave" value="<?php echo @$_GET['search'] ?>" name="search">
                            <button class="botao-pesquisa"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="mt-100 px-5">
        <div class="">
            <div class="candidates-list-top mb-5">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <h2>Mostrando<span style="color: var(--MainColor);">
                            <?php 
                            echo $quantidadelinha[0]
                            
                            ?>
                         </span> Pets
                        </h2>
                    </div>
                    <div class="col-auto">
                        <select class="form-select">
                            <option value="0" selected>Mais recentes</option>
                            <!-- <option value="1">Alfabética Asc</option>
                            <option value="2">Alfabética Desc</option> -->
                        </select>
                    </div>
                </div>
            </div>


            <div class="pets">
                <div class="lista-de-imagens row">

                    <?php
                    $stmt = $pdo->prepare($sql); // prepara o codigo sql
                    $stmt->execute(); // executa e seleciona todos os dados da tabela pets
                    
                    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) { // cria um loop que roda todos os dados da tabela e traz eles em formato de matriz
                    
                        echo "
                        <div class='pet col-3' style=" . "--imagem-fundo:url('../../$row[10]');" . ">
                        <div class='preto'></div>
                        <div class='descricao'>
                            <h2>$row[1]</h2>
                            <h3>$row[2] $row[6] | $row[3]</h3>
                            <div class='oculto'>
                                <h4>Idade: $row[4] anos <br>
                                    Tamanho: $row[5] <br>
                                    Sexo: $row[6]</h4>
                                    <p>$row[7]</p>
                                    <ul>
                                        <li>$row[8]</li>
                                        <li>$row[9]</li>
                                    </ul>
                                    <h4><a href='pet.php?idPet=$row[0]'>Adote já</a></h4>
                            </div>
                        </div>
                    </div>
                    ";

                    }
                    ?>
                </div>
            </div>


            <div class="row mt-4 mt-lg-5 justify-content-center align-items-center">
                <div class="col-auto">
                    <nav class="mt-3 mt-sm-0">
                        <ul class="pagination pagination">
                            <li class="page-item"><a class="page-link" href="?pagina=1"><i class="fa-solid fa-angles-left"></i></a></li>
                            <?php if ($pagina>1): ?>
                            <li class="page-item"><a class="page-link" href="?pagina=<?=$pagina-1?>"><i class="fa-solid fa-angle-left"></i></a></li>
                            <?php endif; ?>
                            <li class="page-item active"><span class="page-link" href="#"><?=$pagina ?> </span></li>
                            <?php if($pagina<$paginas): ?>
                            <li class="page-item"><a class="page-link" href="?pagina=<?=$pagina+1?>"><i class="fa-solid fa-angle-right"></i></a></li>
                            <?php endif; ?>
                            <li class="page-item"><a class="page-link" href="?pagina=<?=$paginas?>"><i class="fa-solid fa-angles-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer style-1 mt-100" id="footer" style="background-image: url(src/img/bg10.png)">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <h5 class="footer-title">
                        Sobre nós | Audote + Auqmia
                    </h5>
                    <div class="col">
                        <div class="widget widget_about">
                            <p>
                                Somos <strong>Audote</strong>, e esse é o
                                nosso site dedicado à adoção de pets! Somos
                                um grupo de estudantes de desenvolvimento de
                                sistemas apaixonados por ajudar animais de
                                rua e promover a adoção responsável. Nosso
                                principal propósito é contribuir com uma
                                organização não governamental (ONG) que se
                                dedica ao resgate e cuidado de animais
                                abandonados, oferecendo uma plataforma para
                                conectar esses animais a lares amorosos.
                                <br />
                                <br />

                                Acreditamos que todos os animais merecem uma
                                segunda chance e uma vida repleta de amor e
                                cuidado. Por isso, decidimos unir nossas
                                habilidades em desenvolvimento de sistemas
                                para criar um espaço online onde você possa
                                conhecer e adotar animais que estão
                                aguardando por um lar afetuoso.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="widget widget_about">
                            <p>
                                Estamos orgulhosos de sermos parceiros da
                                ONG AUQMIA, uma organização comprometida com
                                a proteção e bem-estar dos animais. Juntos,
                                trabalhamos em estreita colaboração para
                                fornecer uma plataforma confiável e segura,
                                onde você possa encontrar informações
                                detalhadas sobre cada animal disponível para
                                adoção, incluindo sua história,
                                características e necessidades especiais, se
                                houver. <br />
                                <br />

                                Ao adotar um pet através do nosso site, você
                                não apenas traz felicidade para sua vida,
                                mas também contribui diretamente para a
                                missão da nossa parceria com a AUQMIA e
                                ajuda a salvar mais animais de rua. Cada
                                adoção faz a diferença e nos aproxima de um
                                mundo onde todos os animais tenham um lar
                                amoroso.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer bottom part -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <span class="copyright-text">Copyright © 2023
                            <a href="#" target="_blank">AUDOTE</a>. Todos
                            direitos Reservados.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/pgprincipal.js"></script>
    <script src="src/js/multi-animated-counter.js"></script>
</body>

</html>