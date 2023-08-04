<?php

require 'config.php';


if (isset($_POST["redefinirsenha"])) {
    $id = $_SESSION["id"];
    $senhaantiga = $_POST["senhaantiga"];
    $senha = $_POST["senha"];
    $confirmasenha = $_POST["confirmasenha"];

    $tbusuario = $pdo->prepare("SELECT * FROM usuarios WHERE id = $id");
    $tbusuario->execute();
    $linhausuario = $tbusuario->fetch(PDO::FETCH_BOTH);
    
    if (password_verify($senhaantiga, $linhausuario['senha'])) {
        if ($senha == $confirmasenha) {
            $hash = password_hash($senha, PASSWORD_DEFAULT);
    
            $result = mysqli_query($conn, " UPDATE  usuarios 
                                            SET senha = '$hash'  
                                            WHERE id='$id';
                                            ");
            if ($result) {
                echo "<script> alert('Senha alterada com sucesso!'); </script>";
                } else {
                    echo "<script> alert('Erro ao alterar senha!'); </script>";
                }
            } else {
                echo "<script> alert('As senhas precisam ser iguais!'); </script>";
            }
        } else {
        echo "<script> alert('Sua senha antiga não é essa!'); </script>";
    }




}
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
            <a href="index.php" class="animate"><span style="color: var(--MainColor)">Audote</span></a>
        </div>

        <nav class="mt-3 mt-lg-4 d-flex justify-content-between flex-column pb-100">
            <div class="dashboard-side-label">Ferramentas administrativas</div>
            <ul class="list-unstyled">
            <li><a href="index.php"><span class="fa fa-home"></span>Inicio</a></li>
                <li><a href="perfil.php"><span class="fa fa-pencil"></span>Editar Perfil</a></li>
                <?php
                if ($_SESSION["tipoConta"] === 'admin') {
                    echo "
                    <li><a href='gerenciarpets.php'><span class='fa-solid fa-paw'></span>Gerencie seus pets</a></li>
                    <li><a href='cadastrarpet.php'><span class='fa-solid fa-circle-plus'></span>Adicione um pet</a></li>
                    ";
                }
                ?>
                <li class="active"><a href="mudarSenha.php"><span class="fa fa-lock"></span>Mudar a senha</a></li>
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
                            <a href="index.php" class="animate"><span style="color: var(--MainColor)">Audote</span></a>
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
            <h1>Mudar a senha</h1>
            <p>Escolha uma nova senha para sua conta</p>

            <form action="" method="POST" onsubmit="enviarform(event)">
                <div class="row mt-4 mt-lg-5">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="senhaantiga" class="form-label">Senha antiga</label>
                            <input type="password" id="senhaantiga" name="senhaantiga" class="form-control"
                                placeholder="Digite sua senha antiga" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="senha" class="form-label">Nova senha</label>
                            <input type="password" id="senha" name="senha" class="form-control"
                                placeholder="Digite sua nova senha" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="confirmasenha" class="form-label">Confirme a senha</label>
                            <input type="password" id="confirmasenha" name="confirmasenha" class="form-control"
                                placeholder="Digite novamente sua senha" required>
                        </div>
                    </div>
                </div>

                <div class="mt-4 mt-lg-5">
                    <button class="btn rounded-pill section-cta" name="redefinirsenha" id="redefinirsenha">Mudar senha</button>
                </div>
            </form>
        </div>

    </div>

    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/pgprincipal.js"></script>
    <script defer>
        function enviarform(event) {
            event.preventdefault();
        }
    </script>
</body>

</html>