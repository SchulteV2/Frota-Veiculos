<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use App\dao\VeiculosDAO;
    
    $id = $_GET['id'];

    $stmt = VeiculosDAO::delete($id);

    header("Location: /veiculos/")

?>