<?php 
    set_include_path( '..' . DIRECTORY_SEPARATOR);

    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\FlashMessages;

    if($_SESSION['logado']) {
        FlashMessages::setMessage("Você já esta logado.", "error");
        header("Location: /veiculos");
        exit(0);
    } else {
        FlashMessages::setMessage("Você precisa estar logado para executar essa ação.", "error");
        header("Location: /usuario/login.php");
        exit(0);
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./partials/_head.php") ?>
    <title>Frota de Carros</title>
    <?php include("./partials/_javascript_import.php") ?>
</head>

<body>
    <?php include("./partials/_header.php") ?>
</body>

</html>