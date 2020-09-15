<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\UsuarioDAO;
    use App\utils\FlashMessages;

    $email =  $_REQUEST['email'];
    $senha =  $_REQUEST['password'];

    $stmt = UsuarioDAO::getByEmail($email);

    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if($user) {
        if(password_verify($senha, $user->senha)) {
            session_start();
            $_SESSION["logado"] = true ;
            FlashMessages::setMessage("Usuário: " . $user->email . ", logou com sucesso!");
            header("Location: /veiculos/");
        } else {
            FlashMessages::setMessage("Senha Inválida", "error");
            header("Location: login.php");
        }

    } else {
        FlashMessages::setMessage("Email Inválido", "error");
        header("Location: login.php");
    }
?>