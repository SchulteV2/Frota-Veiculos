<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\dao\MarcasDAO;
    use App\utils\FlashMessages;

    $id = $_POST['id'];
    $nome =  $_POST['nome'];
    $id_usuario = $_POST['id_usuario'];

    $stmt = MarcasDAO::update($id, $nome, $id_usuario);
    FlashMessages::setMessage("Marca editada com sucesso!");

    header("Location: /marcas/")
?>