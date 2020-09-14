<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\MarcasDAO;
    use App\utils\FlashMessages;

    $nome =  $_POST['nome'];

    $stmt = MarcasDAO::create($nome);
    FlashMessages::setMessage("Marca adicionada com sucesso!");

    header("Location: /marcas/")

?>