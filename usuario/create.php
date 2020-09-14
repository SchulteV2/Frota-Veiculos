<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use App\dao\UsuarioDAO;

    $email =  $_POST['email'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $senha = $hashed_password;

    $stmt = UsuarioDAO::create($email, $senha);

    header("Location: /veiculo/")

?>