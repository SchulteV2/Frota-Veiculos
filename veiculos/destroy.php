<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\VeiculosDAO;
    use App\utils\FlashMessages;
    
    $id = $_GET['id'];

    $stmt = VeiculosDAO::delete($id);
    FlashMessages::setMessage("Veículo excluido com sucesso!");
    header("Location: /veiculos/")
?>