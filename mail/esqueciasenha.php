<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

session_start();

if (!empty($_SESSION['_contact_form_error'])) {
    $error = $_SESSION['_contact_form_error'];
    unset($_SESSION['_contact_form_error']);
}

if (!empty($_SESSION['_contact_form_success'])) {
    $success = true;
    unset($_SESSION['_contact_form_success']);
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
    <link rel="stylesheet" href="../src/style/reglog.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <div class="esqueci-senha">

        <?php
        if (!empty($success)) {
            ?>
            <div class="successo">Uma mensagem foi enviada para seu email! Verifique sua caixa de entrada e a caixa de SPAM, por favor</div>
            <?php
        }
        ?>
        <form action="submit.php" class="sign-in-form" method="POST">
            <h2 class="title">Esqueceu a senha?</h2>
            <p>Iremos enviar um email para você com um link para você <strong>redefinir sua senha</strong></p>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="example@example.com" required>
            </div>

            <div class="form-group text-center">
                <div class="g-recaptcha" data-sitekey="<?= CONTACTFORM_RECAPTCHA_SITE_KEY ?>"></div>
            </div>

            <input type="submit" value="Enviar" class="btn solid" name="esquecisubmit" id="esquecisubmit">
        </form>
    </div>


    <div class="voltar">
        <a href="../index.php">
            <h4>Voltar para a página principal?</h4>
            <i class="fa-solid fa-angle-left"></i>
        </a>
    </div>

</body>

</html>