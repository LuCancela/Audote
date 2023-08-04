<?php require 'config.php';

// Não permitir que entre nessa tela se ja estiver logado

// Criação de conta ou login do usuario 

if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}

// No momento que o usuário apertar o botão de login, esse código será executado
// ele pega as variáveis de email e senha e faz uma pesquisa no banco de dados
// seleciona todos os usuarios onde o email for igual ao que o usuario colocou no campo e coloca a tabela com os valores na variavel $result (resultado)
// coloca na variavel $row (linha) os dados de cada linha

// verifica se a variavel resultado tem algum valor dentro dela, e se tiver ele verifica se a senha digitada é igual a senha na tabelae depois armazena os seguintes dados
// o id do usuario que tiver o email igual ao campo
// o login como verdadeiro
// e ai redireciona o usuario para a pagina audote.php
// esse código está aqui em cima porque quando usamos o header(location: ); ele precisa estar antes de qualquer html, se não ele dá erro

if (isset($_POST["logsubmit"])) {
    $logemail = $_POST["logemail"];
    $logsenha = $_POST["logsenha"];

    $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$logemail'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if (password_verify($logsenha, $row['senha'])) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["tipoConta"] = $row["tipoConta"];
            header("location: index.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/34e911297d.js" crossorigin="anonymous"></script>
    <title>Formulário de login e cadastro</title>
    <link rel="stylesheet" href="src/style/reglog.css">
</head>

<body>

    <!-- Codigo do Form-->
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" method="POST" onsubmit="enviarform(event)">
                    <h2 class="title">Fazer o Login</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email" name="logemail" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Senha" name="logsenha" required>
                    </div>
                    <input type="submit" value="Entrar" class="btn solid" name="logsubmit" id="logsubmit">
                    <p><a href="mail/esqueciasenha.php" class="esqueci">Esqueceu sua senha?</a></p>
                    <div class="erro" id="erro"></div>
                    <div class="acerto" id="acerto"></div>
                </form>

                <form action="#" class="sign-up-form" method="POST" onsubmit="enviarform(event)">
                    <h2 class="title">Cadastrar</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nome" name="regnome" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <select id="tipoConta" name="tipoConta" required>
                            <option value="user" disabled selected>Escolha o tipo de conta</option>
                            <option value="admin">Ong</option>
                            <option value="user">Adotante</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="regemail" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Senha" name="regsenha" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirmar senha" name="regconfirmarsenha" required>
                    </div>
                    <input type="submit" value="Cadastrar" class="btn solid" name="regsubmit" id="regsubmit">
                    <p><a href="#"></a></p>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Novo por aqui?</h3>
                    <p>Faça já seu cadastro e <strong>Audote</strong> seu novo companheiro</p>
                    <button class="btn transparent" id="sign-up-btn">Cadastrar</button>
                </div>

                <img src="src/img/cachorro.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Já tem uma conta?</h3>
                    <p>Entre e <strong>Audote</strong> agora seu novo companheiro</p>
                    <button class="btn transparent" id="sign-in-btn">Entrar</button>
                </div>

                <img src="src/img/adotar.svg" class="image" alt="">
            </div>
        </div>
    </div>

    <div class="voltar">
        <a href="index.php">
            <h4>Voltar para a página principal?</h4>
            <i class="fa-solid fa-angle-left"></i>
        </a>
    </div>


    <?php

    // Formulário de cadastro
    if (isset($_POST["regsubmit"])) {
        // declarando as variaveis do formulário de cadastro
        $regnome = $_POST["regnome"];
        $tipoConta = $_POST["tipoConta"];
        $regemail = $_POST["regemail"];
        $regsenha = $_POST["regsenha"];
        $regconfirmarsenha = $_POST["regconfirmarsenha"];
        $duplicado = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$regemail'");


        if (mysqli_num_rows($duplicado) > 0) {
            echo
                '<script defer>
        const erro = document.getElementById("erro");
        erro.classList.add("active");
        erro.innerHTML = "Desculpe mas esse Email já está em uso";
        </script>';
        } else {
            if ($regsenha == $regconfirmarsenha) {

                $hash = password_hash($regsenha, PASSWORD_DEFAULT);

                $query = "INSERT INTO usuarios VALUES ('', '$regnome', '$tipoConta', '$regemail', '$hash', '', '', '', '', '', '', '', '', '')";
                mysqli_query($conn, $query);
                echo
                    '<script defer> 
            const acerto = document.getElementById("acerto");
            acerto.classList.add("active");
            acerto.innerHTML = "Registrado com sucesso";
            </script>';
            } else {
                echo
                    '<script defer>
            const erro = document.getElementById("erro");
            erro.classList.add("active");
            erro.innerHTML = "Os campos de senha não são iguais";
            </script>';
            }
        }
    }

    // Formulário de Login
    
    // No momento que o usuário apertar o botão de login, esse código será executado
// ele pega as variáveis de email e senha e faz uma pesquisa no banco de dados
// seleciona todos os usuarios onde o email for igual ao que o usuario colocou no campo e coloca a tabela com os valores na variavel $result (resultado)
// coloca na variavel $row (linha) os dados de cada linha
    
    // verifica se a variavel resultado tem algum valor dentro dela, e se tiver ele verifica se a senha digitada é igual a senha na tabelae depois armazena os seguintes dados
// o id do usuario que tiver o email igual ao campo
// o login como verdadeiro
// e ai redireciona o usuario para a pagina audote.php
    if (isset($_POST["logsubmit"])) {
        $logemail = $_POST["logemail"];
        $logsenha = $_POST["logsenha"];
        $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$logemail'");
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            if ($logsenha == $row["senha"]) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("location: index.php");
            } else {
                echo
                    '<script defer>
            const erro = document.getElementById("erro");
            erro.classList.add("active");
            erro.innerHTML = "A senha está errada";
            </script>';
            }
        } else {
            echo
                '<script defer>
        const erro = document.getElementById("erro");
        erro.classList.add("active");
        erro.innerHTML = "Usuario não registrado";
        </script>';
        }
    }
    ?>

    <script defer>
        // atribui para as variaveis alguns elementos do HTML
        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");

        // no momento que for clicado no botão sign_up_btn, será adicionado uma classe css nele com efeitos visuais
        sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
        });

        // no momento que for clicado no botão sign_in_btn, será adicionado uma classe css nele com efeitos visuais
        sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
        });

        // faz com que a página não recarregue no momento em que o botão for apertado
        function enviarform(event) {
            event.preventdefault();
        }
    </script>
</body>

</html>