<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use App\dao\UsuarioDAO;

    $email =  $_GET['email'];
    $senha =  $_GET['password'];

    $stmt = UsuarioDAO::logar($email);

    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if($user) {
        if(password_verify($senha, $user->senha)) {
            echo "voce logou";
            exit (0);
            header("Location: index.php");
        } else {
            echo "deu ruim na senha, tente novamente";
            exit (0);
            header("Location: sign_in.php");
        }

    } else {
        echo "deu ruim no email, tente novamente";
        exit (0);
        header("Location: sign_in.php");
    }
?>