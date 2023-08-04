<header class="header fixed-top no-bg">
    <div class="container">
        <div class="header-container">
            <div class="logo-nav-container">
                <div class="logo">
                    <a href="index.php"><span style="color: var(--MainColor)">Audote</span></a>
                </div>
                <div class="nav-trigger navbar d-xl-none flex-fill">
                    <a role="button" data-bs-toggle="offcanvas" data-bs-target="#MobileNav" aria-controls="MobileNav">
                        <div class="line-1"></div>
                        <div class="line-2"></div>
                        <div class="line-3"></div>
                    </a>
                    <div class="offcanvas offcanvas-start nav-mobile-container" tabindex="-1" id="MobileNav">
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
                                    <li class="nav-item">
                                        <?php

                                        if (!empty($_SESSION["id"])) {
                                            $id = $_SESSION["id"];
                                            $tbusuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
                                            $linhausuario = mysqli_fetch_assoc($tbusuario);
                                            echo "<h3 class='mb-5 fw-bold'>Seja bem vindo, <span style=' text-transform: capitalize; color: var(--MainColor)'>$linhausuario[nome]</span></h3>";
                                        } else {
                                            echo "<h3 class='mb-5 fw-bold'><a href='reglog.php' style='color: var(--MainColor)'>Entrar</a></h3>
                                            ";
                                        }

                                        ?>
                                    </li>
                                    <li class="nav-item">
                                        <a role="button" class="nav-link" href="#">Inicio</a>
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
                                                    <a role='button' class='nav-link' href='gerenciarpet.php'>Gerenciar Pets</a>
                                                    ";
                                            }
                                        }

                                        ?>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <nav class="nav dropdown-hover-all d-none d-xl-block">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a role="button" href="#">Quero adotar</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (!empty($_SESSION["id"])) {
                                if ($_SESSION["tipoConta"] === 'admin') { // verifica se o tipo de conta é admin
                                    echo "
                                                    <a role='button' href='cadastrarpet.php'>Cadastrar Pet</a>
                                                    <a role='button' href='gerenciarpets.php'>Gerenciar Pets</a>
                                                    ";
                                } else {
                                    echo "
                                <li class='nav-item'>
                                    <a role='button' href='#'>Quero ajudar</a>
                                </li>
                                <li class='nav-item'>
                                    <a role='button' href='#'>Parcerias</a>
                                </li>
                                <li class='nav-item'>
                                    <a role='button' href=''#'>Quem somos</a>
                                </li>
                                    ";
                                }
                            }else {
                                echo "
                                <li class='nav-item'>
                                    <a role='button' href='#'>Quero ajudar</a>
                                </li>
                                <li class='nav-item'>
                                    <a role='button' href='#'>Parcerias</a>
                                </li>
                                <li class='nav-item'>
                                    <a role='button' href=''#'>Quem somos</a>
                                </li>
                                    ";
                                }

                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
            <nav class="user-nav on-light">
                <?php
                if (!empty($_SESSION["id"])) {
                    echo "
                    <div class='dropdown user-nav-dropdown'>
                    <a href='#' class='dropdown-toggle' data-bs-toggle='dropdown'>
                        <div class='user-nav-name d-md-block text-capitalize'>
                            $linhausuario[nome]
                        </div>
                    </a>
                    <ul class='dropdown-menu dropdown-menu-end'>
                        <li><a class='dropdown-item' href='perfil.php'>Editar Perfil</a></li>
                        <li><a class='dropdown-item' href='logout.php'>Deslogar</a></li>
                    </ul>
                </div>
                    ";
                } else {
                    echo "
                    <a href='reglog.php' class='btn rounded-pill nav-btn'>Entrar</a>
                    ";
                }

                ?>
            </nav>
        </div>
    </div>
</header>