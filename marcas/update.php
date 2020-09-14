<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\dao\MarcasDAO;
    use App\utils\FlashMessages;

    $id = $_POST['id'];
    $nome =  $_POST['nome'];

    $stmt = MarcasDAO::update($id, $nome);
    FlashMessages::setMessage("Marca editada com sucesso!");

    header("Location: /marcas/")

?>