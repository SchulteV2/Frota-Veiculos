<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

    use App\dao\VeiculosDAO;
    
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $id_marca = $_POST['id_marca'];

    VeiculosDAO::create($nome, $ano, $preco, $id_marca);
    header("Location: /veiculos/")

?>