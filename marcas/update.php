<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    
    use App\dao\MarcasDAO;

    $id = $_POST['id'];
    $nome =  $_POST['nome'];

    $stmt = MarcasDAO::update($id, $nome);

    header("Location: /marcas/")

?>