<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';


    use App\dao\MarcasDAO;
    use App\utils\FlashMessages;

    $id = $_GET['id'];

    $stmt = MarcasDAO::delete($id);

    FlashMessages::setMessage("Marca excluida com sucesso!");
    header("Location: /marcas/")

?>