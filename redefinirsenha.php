<?php

require 'config.php';


if (isset($_POST["redefinirsenha"])) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmsenha = $_POST["confirmsenha"];

    if ($senha == $confirmsenha) {
        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $result = mysqli_query($conn, " UPDATE  usuarios 
                                        SET senha = '$hash'  
                                        WHERE email='$email';
                                        ");

        if ($result) {
            echo "<script> alert('Senha alterada com sucesso!'); </script>";
            header("location:reglog.php");
            } else {
                echo "<script> alert('Erro ao alterar senha!'); </script>";
            }
        } else {
            echo "<script> alert('As senhas precisam ser iguais!'); </script>";
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

    <div class="esqueci-senha">

        <form action="" class="sign-in-form" method="POST" onsubmit="enviarform(event)">
            <h2 class="title">Redefina sua senha</h2>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="example@example.com" required>
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirmsenha" id="confirmsenha" placeholder="Confirme sua senha" required>
            </div>

            <input type="submit" value="Redefinir" class="btn solid" name="redefinirsenha" id="redefinirsenha">
        </form>
    </div>


    <div class="voltar">
        <a href="index.php">
            <h4>Voltar para a página principal?</h4>
            <i class="fa-solid fa-angle-left"></i>
        </a>
    </div>


    <script defer>
        function enviarform(event) {
            event.preventdefault();
        }
    </script>
</body>

</html>