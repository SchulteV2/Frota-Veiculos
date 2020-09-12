<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use App\dao\MarcasDAO;

    $nome =  $_POST['nome'];

    $stmt = MarcasDAO::create($nome);

    header("Location: /marcas/")

?>