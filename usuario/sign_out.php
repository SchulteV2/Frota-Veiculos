<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\FlashMessages;

    session_start();
    unset($_SESSION['logado']);
    session_destroy();
    
    FlashMessages::setMessage("Você se desconectou com sucesso.");
    header("Location: login.php");
?>