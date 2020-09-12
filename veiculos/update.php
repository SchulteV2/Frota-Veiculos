<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use App\dao\VeiculosDAO;
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $id_marca = $_POST['id_marca'];

    VeiculosDAO::update($id, $nome, $ano, $preco, $id_marca);
    header("Location: /veiculos/")
?>
