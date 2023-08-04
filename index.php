<?php
include('config.php');
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

    <title>Audote - Página principal</title>
</head>

<body>
    <header class="header fixed-top bigger px-5">
        <div class="audote-container">
            <div class="header-container">
                <div class="logo-nav-container">
                    <div class="logo light">
                        <a href="#">Audote</a>
                    </div>
                    <div class="nav-trigger navbar light">
                        <a role="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNav"
                            aria-controls="mobileNav">
                            <div class="line-1"></div>
                            <div class="line-2"></div>
                            <div class="line-3"></div>
                        </a>
                        <div class="offcanvas offcanvas-start nav-mobile-container" tabindex="-1" id="mobileNav">
                            <div class="offcanvas-header">
                                <div class="logo">
                                    <a href="index.html"><span style="color: var(--MainColor)">Audote</span></a>
                                </div>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <nav class="nav-mobile">
                                    <ul class="navbar-nav justify-content-end flex-grow-1">
                                        <li class="nav-item">
                                            <?php

                                            if (!empty($_SESSION["id"])) {
                                                $id = $_SESSION["id"];
                                                $tbusuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
                                                $linhausuario = mysqli_fetch_assoc($tbusuario);
                                                echo "<h3 class='mb-5 fw-bold'>Seja bem vindo, <span style=' text-transform: capitalize; color: var(--MainColor)'>$linhausuario[nome]</span></h3>
                                                <a role='button' class='nav-link' href='perfil.php'>Perfil</a>";
                                            } else {
                                                echo "<h3 class='mb-5 fw-bold'><a href='reglog.php' style='color: var(--MainColor)'>Entrar</a></h3>
                                                ";
                                            }

                                            ?>
                                        </li>
                                        <li class="nav-item">
                                            <a role="button" class="nav-link" href="#">Quero adotar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a role="button" class="nav-link" href="#">Quero ajudar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a role="button" class="nav-link" href="#">Parcerias</a>
                                        </li>
                                        <li class="nav-item">
                                            <a role="button" class="nav-link" href="#">Quem somos</a>
                                        </li>
                                        <li class="nav-item">
                                            <?php
                                            if (!empty($_SESSION["id"])) {
                                                if ($_SESSION["tipoConta"] === 'admin') { // verifica se o tipo de conta é admin
                                                    echo "
                                                    <a role='button' class='nav-link' href='cadastrarpet.php'>Cadastrar Pet</a>
                                                    <a role='button' class='nav-link' href='gerenciarpets.php'>Gerenciar Pets</a>
                                                    ";
                                                }
                                            }
                                            
                                            ?>
                                        </li>
                                        <li class="nav-item">
                                            <a role="button" class="nav-link" href="logout.php">Sair</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-container d-none d-xl-block">
                    <div class="hero-form hero-form-round">
                        <form class="row gx-3 align-items-center" action="todospets.php">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Pesquisar pets..."
                                    name="search" />
                            </div>
                            <div class="col-auto">
                                <button>
                                    <span class="fa fa-search"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <nav class="user-nav d-none d-sm-flex">
                    <?php
                    if ($_SESSION == null) {
                        echo '<a href="reglog.php" class="btn rounded-pill nav-btn">Entrar</a>';
                    } else if (!empty($_SESSION["id"])) {
                        echo "<a href='perfil.php' class='btn rounded-pill nav-btn mx-2'><i class='fa-solid fa-user'></i> Perfil</a>";
                        echo "<a href='logout.php' class='btn rounded-pill nav-btn'><i class='fa-solid fa-right-from-bracket'></i> Sair</a>";
                    }

                    ?>
                </nav>
            </div>
        </div>
    </header>

    <section class="hero hero-bg cover" style="background-image: url(src/img/hero-bg-2.jpg)">
        <div class="hero-opacity"></div>
        <div class="hero-caption">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-9 col-xxl-8">
                        <h1 class="text-white text-center">
                            <span style="color: var(--MainColor)">Audote</span>
                            um amigo peludo hoje
                        </h1>
                        <div class="hero-subtitle text-white text-center mt-3 mt-lg-4">
                            Um gesto de amor: adote um pet abandonado e mude
                            uma vida <strong>para sempre.</strong>
                        </div>
                        <div class="mt-3 mt-lg-4 text-center">
                            <a href="todospets.php" class="btn rounded-pill section-cta">Quero adotar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- counter-area -->
    <section class="counter-area counter-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="counter-title text-center mb-65">
                        <h6 class="sub-title">Por que adotar?</h6>
                        <h2 class="title">
                            Muitas pessoas não conhecem os beneficios de
                            adotar um animal
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="counter" id="counters_1">
                        <h2 class="count">
                            <span class="contador" data-TargetNum="74" data-Speed="3000"></span>%
                        </h2>
                        <p>
                            dos donos de animais de estimação relataram
                            melhora significativa em sua saúde mental
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="counter" id="counters_2">
                        <h2 class="count">
                            <span class="contador" data-TargetNum="15" data-Speed="3000"></span>Min
                        </h2>
                        <p>
                            de carinho no seu animal pode reduzir os níveis
                            de cortisol, o hormônio do estresse, em até 10%.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="counter" id="counters_2">
                        <h2 class="count">
                            <span class="contador" data-TargetNum="40" data-Speed="3000"></span>%
                        </h2>
                        <p>
                            interagir com um animal pode aumentar a produção
                            de endorfina e serotonina em até 40%
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="counter" id="counters_2">
                        <h2 class="count">
                            <span class="contador" data-TargetNum="67" data-Speed="3000"></span>%
                        </h2>
                        <p>
                            a menos de chance de crianças que crescem com um
                            animal tem de desenvolver alergias
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- counter-area-end -->

    <section>
        <div class="mx-5">
            <h2 class="section-h2 my-5">
                Veja os ultimos pets
                <span style="color: var(--MainColor)">adicionados</span>
            </h2>

            <div class="pets">
                <div class="lista-de-imagens row">

                    <?php
                    $sql = "SELECT * FROM pets LIMIT 6";
                    $stmt = $pdo->prepare($sql); // prepara o codigo sql
                    $stmt->execute(); // executa e seleciona todos os dados da tabela pets
                    
                    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) { // cria um loop que roda todos os dados da tabela e traz eles em formato de matriz
                    
                        echo "
                        <div class='pet col-4' style=" . "--imagem-fundo:url('../../$row[10]');" . ">
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

            <div class="text-center my-5">
                <a href="todospets.php" class="btn rounded-pill section-cta">Veja todos nossos pets<span
                        class="fa fa-angle-right"></span></a>
            </div>
        </div>
    </section>

    <section class="mx-5 d-flex flex-column justify-content-center align-items-center">
        <h2 class="section-h2 my-5">Não compre, <span style="color: var(--MainColor)">Audote</span>.</h2>
        <div class="row justify-content-md-center">
            <div class="card col-xl-3 col-lg-5 col-sm-12 col-md-12 mx-3">
                <img src="src/img/goodog.svg" class="img">
                <div class="textBox">
                    <p class="text head">Salvar vidas</p>
                    <p class="text price">Ao adotar um animal, você está oferecendo uma segunda chance a um ser vivo que
                        precisa de um lar. Em vez de contribuir para o comércio de animais, você está ajudando a reduzir
                        o número de animais abandonados e a combater o problema do superpovoamento em abrigos</p>
                </div>
            </div>
            <div class="card col-xl-3 col-lg-5 col-sm-12 col-md-12 mx-3">
                <img src="src/img/catfamily.svg" class="img">
                <div class="textBox">
                    <p class="text head">Amor incondicional</p>
                    <p class="text price">Animais de abrigo muitas vezes passaram por situações difíceis e estão
                        sedentos por amor e cuidado. Ao adotar, você está dando a eles a oportunidade de experimentar o
                        afeto e a segurança de um lar amoroso. Em troca, eles retribuem com amor incondicional e
                        lealdade</p>
                </div>
            </div>
            <div class="card col-xl-3 col-lg-10 col-sm-12 col-md-12 mx-3">
                <img src="src/img/dogpark.svg" class="img">
                <div class="textBox">
                    <p class="text head">Variedade de opções</p>
                    <p class="text price">Abrigos e organizações de resgate abrigam uma ampla variedade de animais, de
                        diferentes raças, idades e tamanhos. Você pode encontrar o companheiro perfeito para sua
                        família, independentemente das suas preferências. Há um amigo peludo esperando por você em um
                        abrigo</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-100 mt-100">
        <div class="promo-img cover pt-100 pb-100" style="background-image: url(src/img/bg1.jpg)">
            <div class="row justify-content-md-center">
                <div class="col-sm-12 col-lg-6 text-center">
                    <h2 class="section-h2">
                        Junte-se ao movimento de adoção e seja um herói
                        para um pet necessitado.
                    </h2>
                    <p class="text-light">
                        A adoção de um animal é uma experiência
                        gratificante e transformadora. Ao abrir seu
                        coração e seu lar para um animal resgatado, você
                        está fazendo a diferença na vida de um ser vivo
                        e construindo um futuro mais compassivo para os
                        animais em geral.
                    </p>
                    <div class="mt-4 mt-md-5">
                        <a href="todospets.php" class="btn rounded-pill section-cta">Adote já<span
                                class="fa fa-angle-right"></span></a>
                    </div>
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