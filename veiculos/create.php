<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\dao\VeiculosDAO;
    use App\utils\FlashMessages;
    
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $id_marca = $_POST['id_marca'];

    VeiculosDAO::create($nome, $ano, $preco, $id_marca);
    FlashMessages::setMessage("Veículo adicionado com sucesso!");
    header("Location: /veiculos/")

?>