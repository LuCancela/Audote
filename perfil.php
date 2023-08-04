<?php
include('config.php');
$id = $_SESSION["id"];
$tbusuario = $pdo->prepare("SELECT * FROM usuarios WHERE id = $id");
$tbusuario->execute();
$linhausuario = $tbusuario->fetch(PDO::FETCH_BOTH);
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
                <li class="active"><a href="perfil.php"><span class="fa fa-pencil"></span>Editar Perfil</a></li>
                <?php
                if ($_SESSION["tipoConta"] === 'admin') {
                    echo "
                    <li><a href='gerenciarpets.php'><span class='fa-solid fa-paw'></span>Gerencie seus pets</a></li>
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
                <a role="button" data-bs-toggle="offcanvas" data-bs-target="#MobileNav" aria-controls="MobileNav">
                    <div class="line-1"></div>
                    <div class="line-2"></div>
                    <div class="line-3"></div>
                </a>
                <div class="offcanvas offcanvas-start nav-mobile-container is-dashboard" tabindex="-1" id="MobileNav">
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
                                <li class="nav-item"><a href="mudarSenha.php"><span class="fa fa-lock"></span>Mudar a
                                        senha</a></li>
                                <li class="nav-item"><a href="logout.php"><span
                                            class="fa-solid fa-right-from-bracket"></span>Deslogar</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>

        <div class="dashboard-content-details">
            <h1>Configurar perfil</h1>
            <p>Edite as suas informações de perfil</p>

            <form action="maisinfo.php" method="POST">
                <div class="row mt-4 mt-lg-5">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nome-input" class="form-label">Nome</label>
                            <input type="text" id="nome-input" class="form-control" value="<?php echo @$linhausuario['nome']; ?>" name="nome">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sobrenome-input" class="form-label">Sobrenome</label>
                            <input type="text" id="sobrenome-input" class="form-control"
                            value="<?php echo @$linhausuario['sobrenome']; ?>" name="sobrenome">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cpf-input" class="form-label">CPF</label>
                            <input type="text" id="cpf-input" name="cpf" class="form-control"
                            value="<?php echo @$linhausuario['cpf']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tel-input" class="form-label">Telefone</label>
                            <input type="text" id="tel-input" class="form-control" value="<?php echo @$linhausuario['telefone']; ?>" name="telefone">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cep-input" class="form-label">CEP</label>
                            <div class="d-flex cep-botao">
                                <input type="text" id="cep-input" class="form-control" value="<?php echo @$linhausuario['cep']; ?>" name="cep">
                                <button type="button" onclick="buscarEndereco()">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="logradouro-input" class="form-label">Logradouro</label>
                            <input type="text" id="logradouro-input" class="form-control"
                            value="<?php echo @$linhausuario['logradouro']; ?>" name="logradouro">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="company-new-password" class="form-label">Estado</label>
                            <input type="text" id="estado-input" class="form-control" value="<?php echo @$linhausuario['estado']; ?>" name="estado">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="company-new-password-repeat" class="form-label">Cidade</label>
                            <input type="text" id="cidade-input" class="form-control" value="<?php echo @$linhausuario['cidade']; ?>" name="cidade">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="company-new-password" class="form-label">Bairro</label>
                            <input type="text" id="bairro-input" class="form-control" value="<?php echo @$linhausuario['bairro']; ?>" name="bairro">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="company-new-password-repeat" class="form-label">Número da casa</label>
                            <input type="text" id="numero-input" class="form-control" value="<?php echo @$linhausuario['numero']; ?>" name="numero">
                        </div>
                    </div>
                </div>

                <div class="mt-4 mt-lg-5">
                    <button class="btn rounded-pill section-cta">Salvar perfil</button>
                </div>
            </form>
        </div>

    </div>

    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/pgprincipal.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#cpf-input').inputmask('999.999.999-99');
            $('#cep-input').inputmask('99999-999');
            $('#tel-input').inputmask('+55 99 99999-9999');
        });

        function buscarEndereco() {
            var cep = document.getElementById('cep-input').value;

            // Fazer a requisição HTTP à API de CEPs
            fetch('https://viacep.com.br/ws/' + cep + '/json/')
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    if (data.erro) {
                        alert('CEP não encontrado.');
                    } else {
                        // Preencher os campos de endereço com os dados retornados
                        document.getElementById('logradouro-input').value = data.logradouro;
                        document.getElementById('bairro-input').value = data.bairro;
                        document.getElementById('cidade-input').value = data.localidade;
                        document.getElementById('estado-input').value = data.uf;
                    }
                })
                .catch(function (error) {
                    alert('Ocorreu um erro ao buscar o endereço.');
                    console.log(error);
                });
        }
    </script>
</body>

</html>