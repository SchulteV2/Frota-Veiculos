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
            FlashMessages::setMessage("Usuário logado com sucesso!");
            header("Location: /veiculos/");
        } else {
            FlashMessages::setMessage("Senha Inválida", "error");
            header("Location: sign_in.php");
        }

    } else {
        FlashMessages::setMessage("Email Inválido", "error");
        header("Location: sign_in.php");
    }
?>