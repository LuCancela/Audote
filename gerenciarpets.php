<?php
include('config.php');
?>
<!doctype html>
<html lang="en" class="audote-root">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/34e911297d.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="src/style/pgprincipal.css" />
    <link rel="stylesheet" href="style-inicio.css">

    <title>Audote - Perfil - Mudar a senha</title>
</head>

<body style="background-color: var(--MainColorLight);">
    <div class="dashboard-side-panel d-none d-lg-block">
        <div class="logo">
            <a href="index.php"><span style="color: var(--MainColor)">Audote</span></a>
        </div>

        <nav class="mt-3 mt-lg-4 d-flex justify-content-between flex-column pb-100">
            <div class="dashboard-side-label">Ferramentas administrativas</div>
            <ul class="list-unstyled">
            <li><a href="index.php"><span class="fa fa-home"></span>Inicio</a></li>
                <li><a href="perfil.php"><span class="fa fa-pencil"></span>Editar Perfil</a></li>
                <?php
                if ($_SESSION["tipoConta"] === 'admin') {
                    echo "
                    <li  class='active'><a href='gerenciarpets.php'><span class='fa-solid fa-paw'></span>Gerencie seus pets</a></li>
                    <li><a href='cadastrarpet.php'><span class='fa-solid fa-circle-plus'></span>Adicione um pet</a></li>
                    ";
                }
                ?>
                <li><a href="mudarSenha.php"><span class="fa fa-lock"></span>Mudar a senha</a></li>
                <li><a href="logout.php"><span class="fa-solid fa-right-from-bracket"></span>Deslogar</a></li>
            </ul>
        </nav>
    </div>
    <div class="dashboard-content">
        <div class="dashboard-content-header">
            <div class="nav-trigger navbar is-dashboard d-lg-none">
                <a role="button" data-bs-toggle="offcanvas" data-bs-target="#pxpMobileNav" aria-controls="pxpMobileNav">
                    <div class="line-1"></div>
                    <div class="line-2"></div>
                    <div class="line-3"></div>
                </a>
                <div class="offcanvas offcanvas-start nav-mobile-container is-dashboard" tabindex="-1"
                    id="pxpMobileNav">
                    <div class="offcanvas-header">
                        <div class="logo">
                            <a href="index.php"><span style="color: var(--MainColor)">Audote</span></a>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <nav class="nav-mobile">
                            <ul class="navbar-nav justify-content-end flex-grow-1">
                                <li class="dropdown-header">Ferramentas administrativas</li>
                                <li class="nav-item"><a href="index.php"><span class="fa fa-home"></span>Inicio</a></li>
                                <li class="nav-item"><a href="perfil.php"><span class="fa fa-pencil"></span>Editar
                                        perfil</a></li>
                                <?php
                                if ($_SESSION["tipoConta"] === 'admin') {
                                    echo "
                                        <li class='nav-item'><a href='gerenciarpets.php'><span class='fa-solid fa-paw'></span>Gerencie seus pets</a></li>
                                        <li class='nav-item'><a href='cadastrarpet.php'><span class='fa-solid fa-circle-plus'></span>Adicione um pet</a></li>
                                        ";
                                }
                                ?>
                                <li class="nav-item"><a href="mudarSenha.php"><span class="fa fa-lock"></span>Mudar a senha</a></li>
                                <li class="nav-item"><a href="logout.php"><span class="fa-solid fa-right-from-bracket"></span>Deslogar</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>

        <div class="dashboard-content-details">

            <div class="table-responsive">
                <h1 class="text-center h1">Gerencie os seus Pets</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome do pet</th>
                            <th scope="col">Tipo de animal</th>
                            <th scope="col">Raça</th>
                            <th scope="col">Idade</th>
                            <th scope="col">Porte</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Descricao</th>
                            <th scope="col">Vacinas</th>
                            <th scope="col">Vermifugado</th>
                            <th scope="col">Imagem do Pet</th>
                            <th scope="col">Características</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = $_SESSION["id"];
                        $stmt = $pdo->prepare("select * from pets WHERE idUsuario = $id"); // prepara o SQL
                        $stmt->execute(); // executa o código e seleciona todos os dados da tabela pets
                        
                        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) { // faz um loop que percorre todos os dados da pesquisa sql
                            echo "<tr class='celula'>";
                            echo "<td> $row[idPet] </td>";
                            echo "<td> $row[nomePet] </td>";
                            echo "<td> $row[tipoAnimal] </td>";
                            echo "<td> $row[raca] </td>";
                            echo "<td> $row[idadePet] </td>";
                            echo "<td> $row[porte] </td>";
                            echo "<td> $row[sexo] </td>";
                            echo "<td> $row[descricao] </td>";
                            echo "<td> $row[vacinas] </td>";
                            echo "<td> $row[vermifugado] </td>";
                            echo "<td> <img src='$row[imagemPet]'> </td>";
                            echo "<td> $row[caracteristicas] </td>";
                            echo "<td> 
                            <a href='removerPet.php?idPet=$row[0]'><i class='fa-solid fa-trash'></i></a>
                            <a href='editarpets.php?idPet=$row[0]'><i class='fa-solid fa-pencil'></i></a>
                          </td>"; // com o código ?idPet=$row[0] armazena no campo $_GET['idPet'] o valor da variavel $row[0] sendo possivel assim colocar esse valor em outras páginas
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/pgprincipal.js"></script>
</body>

</html>