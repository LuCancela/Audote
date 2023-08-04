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
                    <li class='active'><a href='cadastrarpet.php'><span class='fa-solid fa-circle-plus'></span>Adicione um pet</a></li>
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
        <section>
        <!-- Nessa seção será feito o formulário para cadastramento dos pets -->
        <form action="salvarpet.php" method="POST" enctype="multipart/form-data" class="container cadastrar-pet">

            <h1 class="text-center h1">Cadastre o seu Pet <i class="fa-solid fa-dog"></i></h1>

            <div class="row input-row">
                <div class="col-md-6 input-col">
                    <label for="nomePet" class="form-label">Nome do Pet</label>
                    <input required type="text" placeholder="Ex: Rex, bob, Marley" name="nomePet" id="nomePet"
                        class="pesquisar-input" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="tipoAnimal" class="form-label">Tipo de animal</label>
                    <input required type="text" placeholder="Ex: Gato, cachorro, coelho" name="tipoAnimal"
                        id="tipoAnimal" class="pesquisar-input" />
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="raca" class="form-label">Raça</label>
                    <input required type="text" placeholder="Ex: Rottweiler, Vira-lata, Akita inu" name="raca" id="raca"
                        class="pesquisar-input" />
                </div>

                <div class="mb-3 col-md-6">
                    <label for="idadePet" class="form-label">Idade do Pet</label>
                    <input required type="number" placeholder="Insira a idade em anos" name="idadePet" id="idadePet"
                        class="pesquisar-input" />
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="porte" class="form-label">Porte do Pet</label>
                    <input required type="text" placeholder="Ex: pequeno, médio" name="porte" id="porte"
                        class="pesquisar-input" />
                </div>

                <div class="mb-3 col-md-6">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="pesquisar-input" id="sexo" name="sexo" required>
                        <option selected disabled>Qual o sexo do seu PET?</option>
                        <option value="Macho">Macho</option>
                        <option value="Fêmea">Fêmea</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="descricao" class="form-label">Descricao do Pet</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"
                    placeholder="Insira aqui a descrição/história do seu Pet" required class="pesquisar-input descricao"
                    maxlength="255"></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="vacina" class="form-label">Vacinas</label>
                    <select class="pesquisar-input" id="vacina" name="vacina" required>
                        <option selected disabled>Seu PET é vacinado?</option>
                        <option value="Vacinado">Vacinado</option>
                        <option value="Não vacinado">Não vacinado</option>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="vermifugado" class="form-label">Vermifugado</label>
                    <select class="pesquisar-input" id="vermifugado" name="vermifugado" required>
                        <option selected disabled>Seu PET é vermifugado?</option>
                        <option value="Vermifugado">Vermifugado</option>
                        <option value="Não vermifugado">Não vermifugado</option>
                    </select>
                </div>
            </div>

            <div class="col-xxl-6">
                <div class="company-cover mb-3">
                    <p>Imagem do pet</p>
                    <input type="file" id="company-cover-choose-file" accept="image/*" name="imagemPet" id="imagemPet" required>
                    <label for="company-cover-choose-file" class="cover" style="background-position: center;"></label>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="caracteristicas" class="form-label">Características do PET separadas por vírgula</label>
                <textarea name="caracteristicas" id="caracteristicas" cols="30" rows="10"
                    placeholder="Insira aqui as caracteristicas. (Ex: Dócil, Carente, Quieto) Quanto mais caracteristicas melhor!" required
                    class="pesquisar-input descricao" maxlength="255"></textarea>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="botao"> <i class="fa-solid fa-paw"></i> Cadastrar Pet</button>
            </div>


        </form>
    </div>

    <script src="./src/js/app.js"></script>
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