<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use App\dao\MarcasDAO;

    $id = $_GET['id'];

    $stmt = MarcasDAO::delete($id);

    header("Location: /marcas/")

?>