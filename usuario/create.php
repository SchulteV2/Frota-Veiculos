<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\UsuarioDAO;
    use App\utils\FlashMessages;

    $email =  $_POST['email'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $senha = $hashed_password;

    $stmt = UsuarioDAO::create($email, $senha);
    FlashMessages::setMessage("Usuário criado com sucesso!");
    header("Location: /usuario/sign_in.php")

?>