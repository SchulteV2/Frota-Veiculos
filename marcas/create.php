<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\MarcasDAO;
    use App\utils\FlashMessages;

    $nome =  $_POST['nome'];
    $id_usuario = $_POST['id_usuario'];

    $stmt = MarcasDAO::create($nome, $id_usuario);
    FlashMessages::setMessage("Marca adicionada com sucesso!");

    header("Location: /marcas/")

?>