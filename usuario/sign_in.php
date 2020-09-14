<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("partials/_head.php") ?>
    <title>Login</title>
    <?php include("partials/_javascript_import.php") ?>
    <link rel="stylesheet" href="sign_in.css">
</head>

<body>
    <?php include("partials/_header.php") ?>
    <div class="cardbox">
        <div class="Card">
            <div class="Title">Login</div>
                <div class="Content">
                <?php include("partials/_flash_messages.php") ?>
                    <form action="/usuario/login.php" method="POST">
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@exemplo.com">
                        </div>
                        <div>
                            <label for="password" class="mt-2">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div>
                            <input type="submit" value="Entrar" class="btn btn-success mt-2 float-right">
                        </div>
                    </form>
                </div>
            </div>
    </div>
</body>

</html>