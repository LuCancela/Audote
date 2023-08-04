<?php
include('config.php');

$idPet = $_GET["idPet"];
$pet = $pdo->prepare("select * from pets WHERE idPet = $idPet");
$pet->execute();
$petlinha = $pet->fetch(PDO::FETCH_BOTH)
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
            <section id="editarForm">
                <form action="editarPet.php" method="POST" class="container cadastrar-pet" enctype="multipart/form-data">

                    <h1 class="text-center h1">Edite o seu Pet</h1>

                    <input type="text" value="<?php echo $petlinha[0]; ?>" name="idPet" hidden>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="nomePet" class="form-label">Nome do Pet</label>
                            <input required type="text" value="<?php echo $petlinha[1]; ?>" name="nomePet" id="nomePet"
                                class="form-control" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="tipoAnimal" class="form-label">Tipo de animal</label>
                            <input required type="text" value="<?php echo $petlinha[2]; ?>" name="tipoAnimal"
                                id="tipoAnimal" class="form-control" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="raca" class="form-label">Raça</label>
                            <input required type="text" value="<?php echo $petlinha['raca']; ?>" name="raca" id="raca"
                                class="form-control" />
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="idadePet" class="form-label">Idade do Pet</label>
                            <input required type="number" value="<?php echo $petlinha['idadePet']; ?>" name="idadePet"
                                id="idadePet" class="form-control" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="porte" class="form-label">Porte do Pet</label>
                            <input required type="text" value="<?php echo $petlinha['porte']; ?>" name="porte"
                                id="porte" class="form-control" />
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select class="form-select" id="sexo" name="sexo" required>
                                <option selected value="<?php echo $petlinha['sexo']; ?>"><?php echo $petlinha['sexo']; ?>
                                </option>
                                <option value="Macho">Macho</option>
                                <option value="Fêmea">Fêmea</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descricao do Pet</label>
                        <textarea name="descricao" id="descricao" cols="30" rows="10"
                            value="Insira aqui a descrição/história do seu Pet" required class="form-control"
                            maxlength="255"><?php echo $petlinha['descricao']; ?></textarea>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="vacinas" class="form-label">Vacinas</label>
                            <select class="form-select" id="vacinas" name="vacinas" required>
                                <option selected value="<?php echo $petlinha['vacinas']; ?>"><?php echo $petlinha['vacinas']; ?>
                                </option>
                                <option value="Vacinado">Vacinado</option>
                                <option value="Não vacinado">Não vacinado</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="vermifugado" class="form-label">Vermifugado</label>
                            <select class="form-select" id="vermifugado" name="vermifugado" required>
                                <option selected value="<?php echo $petlinha['vermifugado']; ?>"><?php echo $petlinha['vermifugado']; ?></option>
                                <option value="Vermifugado">Vermifugado</option>
                                <option value="Não vermifugado">Não vermifugado</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xxl-6">
                        <div class="company-cover mb-3">
                            <p>Imagem do pet</p>
                            <input type="file" id="company-cover-choose-file" accept="image/*" name="imagemPet"
                            id="imagemPet" value="<?php echo $petlinha['imagemPet'] ?>">
                            <label for="company-cover-choose-file" class="cover"
                                style="background-position: center;background-image: url('<?php echo $petlinha['imagemPet'] ?>')"></label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="caracteristicas" class="form-label">Características do Pet (separe por
                            virgula)</label>
                        <textarea name="caracteristicas" id="caracteristicas" cols="30" rows="10" required
                            class="form-control" maxlength="255"><?php echo $petlinha['caracteristicas']; ?></textarea>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="botao"> <i class="fa-solid fa-paw"></i> Salvar</button>
                    </div>
                </form>
            </section>
        </div>

    </div>

    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/pgprincipal.js"></script>
    <script>
        // Obtém o elemento input e o elemento cover
        const fileInput = document.getElementById('company-cover-choose-file');
        const coverElement = document.querySelector('.cover');

        // Adiciona um ouvinte de evento para o evento de alteração do input
        fileInput.addEventListener('change', function (event) {
            // Obtém o arquivo selecionado
            const file = event.target.files[0];

            // Verifica se um arquivo foi selecionado
            if (file) {
                // Cria um objeto URL temporário para a imagem
                const imageURL = URL.createObjectURL(file);

                // Define o estilo de plano de fundo do elemento cover
                coverElement.style.backgroundImage = `url(${imageURL})`;
            }
        });
    </script>
</body>

</html>